<template>
    <div class="row">
        <div class="col-12">
            <form v-on:submit.prevent="guardarReceta">
                <div class="form-group">
                    <label>Cliente</label>
                    <select class="form-control" name="idCliente" v-model="idCliente" required>
                        <option :value="null" disabled>Ingrese nombre de Cliente</option>
                        <option v-for="(cliente,index) in clientes" :key="cliente.id" :value="cliente.id">
                            {{cliente.nombre}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control" name="direccion" v-model="direccion"
                           placeholder="Ingrese direccion de retiro">
                </div>
                <div class="form-group">
                    <label>Pago</label>
                    <select class="form-control" name="pagoElegido" v-model="pagoElegido" required>
                        <option :value="null" disabled>Ingrese pago de Venta</option>
                        <option v-for="(pago) in pagos" :key="pago" :value="pago">{{pago}}</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Cantidad productos</label>
                        <input type="number" class="form-control" name="cant" v-model="cant"
                               placeholder="Ingrese la cantidad total de productos" disabled required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Costo de envio</label>
                        <input type="number" min="0" max="9999999" class="form-control" id="envio" v-model="envio" v-on:keyup="sumarCostos()"
                               v-on:click="sumarCostos()" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Costo total de productos</label>
                        <input type="number" class="form-control" name="costoProductos"
                               placeholder="Ingrese el costo total de productos" disabled v-model="costoProductos"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Costo Total</label>
                    <input type="number" class="form-control" name="costoTotal" v-model="costoTotal"
                           placeholder="Ingrese costo total de productos" disabled required>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(producto,index) in productos" :key="producto.id">
                            <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" :id="producto.id"
                                           :value="producto.id"
                                           @change="cambiarEstado(producto.id)" v-model="productosSelected">
                                    <label class="custom-control-label"
                                           :for="producto.id">{{producto.codigo_producto}}</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <label :for="producto.id">{{producto.stock}}</label>
                            </td>
                            <td class="text-center">
                                <label :for="producto.id">{{producto.precio_producto}}</label>
                            </td>
                            <td>
                                <input type="number" min="0" :max="producto.stock" class="form-control" v-model="cantProducto[index]"
                                       :id="'cantidad'+producto.id"
                                       placeholder="Ingrese la cantidad del producto elegido"
                                       disabled v-on:keyup="sumarCostos()" v-on:click="sumarCostos()" required>
                            </td>
                            <td>
                                <input type="number" class="form-control" v-model="costoProd[index]"
                                       placeholder="Ingrese el costo total del producto elegido" disabled
                                       v-on:keyup="sumarCostos()" required>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="text-center mb-2">
                    <a class="btn btn-secondary" href="/">Cancelar</a>
                    <button type="submit" class="btn btn-secondary">Agregar</button>
                </div>

            </form>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                direccion: "",
                pagoElegido: "",
                cant: 0,
                envio: 0,
                costoProductos: 0,
                costoTotal: 0,
                costoProd: [],
                cantProducto: [],
                productos: [],
                idCliente: null,
                idVenta: null,
                clientes: [],
                pagos: [],
                productosSelected: []
            }
        },
        mounted() {
            axios.get('/listClientes').then(response => (this.clientes = response.data));
            axios.get('/listProductos').then(response => (this.productos = response.data));
            axios.get('/listPagos').then(response => (this.pagos = response.data));
            axios.get('/buscarVenta').then(response => (this.idVenta = response.data));
        },
        methods: {
            sumarCostos: function () {
                this.costoTotal = parseInt(this.envio);
                this.costoProductos = 0;
                this.cant = 0;

                for (var i = 0; i < this.productosSelected.length; i++) {
                    this.costoTotal = this.costoTotal + this.productos[this.productosSelected[i] - 1].precio_producto * parseInt(this.cantProducto[this.productosSelected[i] - 1]);
                    this.costoProductos = this.costoProductos + this.productos[this.productosSelected[i] - 1].precio_producto * parseInt(this.cantProducto[this.productosSelected[i] - 1]);
                    this.cant = this.cant + parseInt(this.cantProducto[this.productosSelected[i] - 1]);
                    this.costoProd[this.productosSelected[i] - 1] = this.productos[this.productosSelected[i] - 1].precio_producto * parseInt(this.cantProducto[this.productosSelected[i] - 1]);
                }
            },
            cambiarEstado: function ($id) {

                var estadoActual = document.getElementById('cantidad' + $id);
                if (estadoActual.disabled) {
                    estadoActual.disabled = false;
                } else {
                    estadoActual.disabled = true;
                    if (this.costoTotal == 0) {
                        this.costoTotal = 0;
                    } else {
                        this.costoTotal = this.costoTotal - this.productos[$id - 1].precio_producto * parseInt(this.cantProducto[$id - 1]);
                    }

                    if (this.costoProductos == 0) {
                        this.costoProductos = 0;
                    } else {
                        this.costoProductos = this.costoProductos - this.productos[$id - 1].precio_producto * parseInt(this.cantProducto[$id - 1]);
                    }

                    if (this.cant == 0) {
                        this.cant = 0;
                    } else {
                        this.cant = this.cant - parseInt(this.cantProducto[$id - 1]);
                    }
                    if (this.costoProd[$id - 1] == 0) {
                        this.costoProd[$id - 1] = 0;
                    } else {
                        this.costoProd[$id - 1] = this.costoProd - this.productos[$id - 1].precio_producto * parseInt(this.cantProducto[$id - 1]);
                    }
                    this.costoProd[$id - 1] = null;
                    this.cantProducto[$id - 1] = null;


                }
            },
            guardarReceta: function () {
                var pruebaProductos = [];
                for (var i = 0; i < this.productosSelected.length; i++) {
                    pruebaProductos.push({
                        'venta_id': this.idVenta,
                        'producto_id': this.productosSelected[i],
                        'cantidad': parseInt(this.cantProducto[this.productosSelected[i] - 1]),
                        'precio': this.costoProd[this.productosSelected[i] - 1]

                    });
                }
                console.log(this.idVenta);
                console.log(pruebaProductos);
                axios.post('/guardarVenta', {
                    venta: {
                        cantidad_productos: this.cant,
                        costo_envio: this.envio,
                        costo_productos: this.costoProductos,
                        costo_total: this.costoTotal,
                        direccion: this.direccion,
                        pago: this.pagoElegido,
                        cliente_id: this.idCliente
                    },
                    productos: pruebaProductos
                }).then(function (response) {
                    console.log(response.data)
                });

                window.location.href = "/listarVentas";
            }
        }
    }
</script>