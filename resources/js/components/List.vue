<template>
    <div class="row">
        <div class="col-12">
            <div class="pb-4">
                <label for="search">Busqueda:</label>
                <input
                    @keyup="searchSpare"
                    v-model="search"
                    type="text" id="search" name="search" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <table id="table" class="table table-responsive table-hover table-bordered" style="width: 100%">

                <thead class="bg-dark">
                <tr>
                    <th width="5%">Codigo</th>
                    <th width="30%">Descripcion</th>
                    <th width="7%">Categoria</th>
                    <th>Marca</th>
                    <th>Medida</th>
                    <th width="5%">Codigo respuesto</th>
                    <th>Venta</th>
                    <th v-if="isAdmin">Compra</th>

                    <th hidden>Cod. Original</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="spare in spares">
                    <td>{{spare.code}}</td>
                    <td>{{spare.description}}</td>
                    <td>{{spare.category}}</td>
                    <td>{{spare.brand}}</td>
                    <td>{{spare.measure}}</td>
                    <td>{{spare.original_code}}</td>
                    <td>{{spare.price}}</td>
                    <td>{{spare.investment}}</td>
                    <td>
                        <form :action="'spares/'+spare.id" method="POST">
                            <input type="hidden" name="_token" value="DYoNDfr9LYHMVyijoT88sFlrW5xoGwGxLP22gaSF">
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="btn-group">

                                <a class="btn btn-warning show-information" v-on:click="showSpare(spare.id)">
                                    <i class='fas fa-eye'></i>
                                </a>
                                <a v-if="isAdmin" :href="'spares/'+spare.id+'/edit'"
                                   class="btn btn-primary">
                                    <i class='fas fa-pencil-alt'></i>
                                </a>
                                <button type="submit" class="btn btn-danger" v-if="isAdmin"
                                        data-toggle="modal" data-target="#deleteModal">
                                    <i class='fas fa-trash-alt'></i>
                                </button>

                            </div>
                        </form>
                    </td>

                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th width="5%">Codigo</th>
                    <th width="30%">Decripcion</th>
                    <th width="7%">Categoria</th>
                    <th>Marca</th>
                    <th>Medida</th>
                    <th width="5%">Codigo respuesto</th>
                    <th>Venta</th>
                    <th v-if="isAdmin">Compra</th>
                    <th hidden>Cod. Original</th>
                    <th>Opciones</th>
                </tr>
                </tfoot>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><button class="page-link" v-if="!isFirst" v-on:click="getPageBefore" >Atras</button></li>
                    <li class="page-item"><button class="page-link" v-if="!isLast"  v-on:click="getPageAfter" >Siguiente</button></li>
                </ul>
            </nav>
            <div
                 v-if="show"
                 class="modal fade show"
                 id="info-modal"
                 tabindex="-1"
                 role="dialog"
                 aria-labelledby="modal" aria-hidden="true"
                 style="display: block; padding-right: 17px;"
            >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <strong><h3 class="modal-title" id="modal-label">
                                {{spare.code}}
                            </h3></strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="showModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-2">
                                <div class="col-7">
                                    <img :src="this.image" alt="No image" class="img-fluid img-fluid" id="product-image">
                                </div>
                                <div class="col-5">
                                    <ul class="list-group mb-1">
                                        <li class="list-group-item">
                                            <b>Codigo:</b> <a class="float-right" id="product-code-modal">{{spare.code}}</a>

                                        </li>
                                        <li class="list-group-item">
                                            <b>Codigo original:</b> <a class="float-right" id="product-original-code-modal">
                                            {{spare.original_code}}
                                        </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Codigo producto:</b> <a class="float-right" id="product-pro-code-modal">
                                            {{spare.product_code}}
                                        </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Descripcion:</b> <a class="float-right" id="product-description-modal">
                                            {{spare.description}}
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <li class="list-group-item col-6" v-if="show">
                                    <b>Categoria</b> <a class="float-right" id="product-category-modal" >
                                        {{spare.category.name}}
                                </a>
                                </li>
                                <li class="list-group-item col-6" v-if="show">
                                    <b>Marca</b> <a class="float-right" id="product-brand-modal">{{spare.brand.name}}</a>
                                </li>
                                <li class="list-group-item col-4">
                                    <b>Medida</b> <a class="float-right" id="product-measure-modal">{{spare.measure}}</a>
                                </li>
                                <li class="list-group-item col-4">
                                    <b>Cantidad</b> <a class="float-right" id="product-quantity-modal">{{spare.quantity}}</a>
                                </li>
                                <li class="list-group-item col-4">
                                    <b>Nacionalidad</b> <a class="float-right" id="product-brand-nationality">{{spare.brand.country}}</a>
                                </li>
                                <li class="list-group-item col-4">
                                    <b>Venta</b> <a class="float-right" id="product-price-modal">{{spare.price}}</a>
                                </li>
                                <li class="list-group-item col-4">
                                    <b>Venta mayor</b> <a class="float-right" id="product-pricem-modal">{{spare.price_m}}</a>
                                </li>
                                <li class="list-group-item col-4" v-if="isAdmin">
                                    <b>Compra</b> <a class="float-right" id="product-investment-modal">{{spare.investment}}</a>

                                </li>
                                <li class="list-group-item col-6">
                                    <b>Fecha creacion</b> <a class="float-right" id="product-created-at-modal">{{spare.created_at}}</a>
                                </li>
                                <li class="list-group-item col-6">
                                    <b>Ultima actulizacion</b> <a class="float-right" id="product-updated-at-modal">{{spare.updated_at}}</a>
                                </li>
                                <li class="list-group-item col-12">
                                    <b>Linea de carro</b> <a class="float-right" id="product-code-carline">
                                    <span class="row" v-if="spare.car_lines">
                                        <p v-for="car in spare.car_lines" class="col-2">
                                        {{car.name}}
                                        </p>
                                    </span>

                                </a>
                                </li>
                                <li class="list-group-item col-12" v-if="stores">
                                    <h6 class="text-bold text-center" id="quantityStores">Cantidades segun tiendas</h6>
                                    <span class="col-3" v-for="store in this.stores" >
                                        {{store.name}}: {{store.quantity}}
                                    </span>

                                </li>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="showModal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




</template>

<script>
    export default {
        props: ['isAdmin'],
        data: function () {
            return {
                spares: [],
                show: Boolean,
                search: String,
                pagination: {},
                isLast: Boolean,
                isFirst: Boolean,
                spare: {},
                image: String,
                stores: []
            }
        },
        mounted() {
            this.isLast = false;
            this.isFirst= false;
            this.show = false;
            this.search = '';
            this.loadSpares();
        },
        methods: {
            showModal() {
                this.show = !this.show;
            },
            showSpare(id) {
                this.show = true;
                axios.get('/get-spare?id=' + id)
                    .then((response) => {
                        this.spare = response.data;
                        this.image = response.data.image;
                        console.log(this.spare);
                    });
                axios.get('/get-store-spare?id=' + id)
                    .then((response) => {
                       this.stores = response.data;
                });
            },
            loadSpares() {
                axios.get('/search-spare?search=')
                    .then((response) => {
                        this.spares = response.data.data;
                        const actualPage = response.data.current_page;
                        const lastPage = response.data.last_page;
                        this.createPagination(actualPage, lastPage);
                    })
                    .catch((error) => console.log(error));
            },
            searchSpare() {
                axios.get('/search-spare?search=' + this.search)
                    .then((response) => {
                        this.spares = response.data.data;

                        const actualPage = response.data.current_page;
                        const lastPage = response.data.last_page;
                        this.createPagination(actualPage, lastPage, this.search);
                    }).catch((err) => {
                    console.log(err);
                });
            },
            getPageBefore() {
                axios.get(this.pagination.before)
                    .then((response) => {
                        this.spares = response.data.data;

                        const actualPage = response.data.current_page;
                        const lastPage = response.data.last_page;
                        this.createPagination(actualPage, lastPage, this.search);
                    }).catch((err) => {
                    console.log(err);
                });
            },
            getPageAfter() {
                axios.get(this.pagination.next)
                    .then((response) => {
                        this.spares = response.data.data;
                        const actualPage = response.data.current_page;
                        const lastPage = response.data.last_page;
                        this.createPagination(actualPage, lastPage, this.search);

                    }).catch((err) => {
                    console.log(err);
                });
            },
            createPagination(page, limit, search='') {
                this.isLast = page === limit;
                this.isFirst = page === 1;
                let nextPage = page + 1;
                let beforePage = page - 1;
                this.pagination.next = `/search-spare?search=${search}&page=${nextPage}`;
                this.pagination.before = `/search-spare?search=${search}&page=${beforePage}`;
                console.log(this.pagination);
            }

        }
    }
</script>
