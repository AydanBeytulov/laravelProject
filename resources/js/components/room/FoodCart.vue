<template>

<div>
    My cart

    <table width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Pic</th>
            <th>Price</th>
            <th>QTY</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>

        <tr v-for="cartProduct  in cartProducts">
            <td>{{ cartProduct.id }}</td>
            <td>{{ cartProduct.name }}</td>
            <td><img :src="cartProduct.image" :alt="cartProduct.name" width="50"></td>
            <td>{{ cartProduct.price }}</td>
            <td>{{ cartProduct.qty }}</td>
            <td>{{ cartProduct.totalPrice }}</td>
        </tr>

        </tbody>
    </table>

   Total:  {{ cartTotal }}
    <hr>
    <a class="btn btn-primary" href="javascript:void(0);"  v-on:click="order_cart" >Order</a>
</div>

</template>

<script>

    export default {

        props: ['cartProducts'],

        data: function (){ return {} },

        methods: {
            order_cart: function () {
                if (confirm("Are you sure ?")) {
                    let saveThis = this ;
                    window.axios.post('/api/makeFoodsOrder', {
                        products: this.$props.cartProducts,
                        api_token: "mwns7bequ6nn3KQitPu8O7AtqSIAGqwRtzuds9aMFpQ9iYsa2DWAZ5NDKnsd"
                    }).then(function (response) {
                        saveThis.$props.cartProducts = [] ;
                        localStorage.cartProducts = JSON.stringify(saveThis.$props.cartProducts);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
        },

        computed: {

            cartTotal: function () {
                if(this.$props.cartProducts.length > 0){
                    return this.$props.cartProducts.reduce(function (total, value) {
                        total = Number(total) + (Number(value.price) * Number(value.qty) );
                        return Number.parseFloat(total).toFixed(2) ;
                    }, 0) ;
                }else{
                    return 0 ;
                }

            }
        },
        mounted() {

        }
    }

</script>
