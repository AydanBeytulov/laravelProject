<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <room-food-cart v-bind:cartProducts="cartProducts"></room-food-cart>

                <room-foods-list v-bind:orderProducts="orderProducts"  v-bind:cartProducts="cartProducts"></room-foods-list>

            </div>
        </div>
    </div>
</template>

<script>
    import foodCart from "./FoodCart";
    import foodList from "./ListFoods";

    export default {

        components:{ foodList: foodList, foodCart: foodCart },

        data: function (){
            return {
                orderProducts: [],
                cartProducts: [],
            }
        },

        mounted() {

            let saveThis = this;
            window.Axios.get('/api/Foods').then(function (response) {
                saveThis.orderProducts = response.data.data;
                localStorage.orderProducts = JSON.stringify(response.data.data);
            });


            if(localStorage.orderProducts !== undefined && localStorage.orderProducts.length > 0){
                this.orderProducts = JSON.parse(localStorage.orderProducts) ;
            }else{
                this.orderProducts = []  ;
            }

            if(localStorage.cartProducts !== undefined && localStorage.cartProducts.length > 0){
                this.cartProducts = JSON.parse(localStorage.cartProducts) ;
            }else{
                this.cartProducts = []  ;
            }
        }
    }

</script>
