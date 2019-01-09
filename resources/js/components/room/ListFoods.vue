<template>

    <div>
        Foods list

        <table width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Pic</th>
                <th>Price</th>
                <th>Buy</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="(orderProduct, key)  in orderProducts" >
                <td>{{ orderProduct.id }}</td>
                <td>{{ orderProduct.name }}</td>
                <td><img :src="orderProduct.image" :alt="orderProduct.name" width="50"></td>
                <td>{{ orderProduct.price }}</td>
                <td><a href="javascript:void(0);" @click="addProductToCart(orderProduct)" >Add to Cart</a></td>
            </tr>

            </tbody>
        </table>
    </div>

</template>

<script>

    export default {

        props: ['orderProducts','cartProducts'],

        data: function (){ return { }
        },

        methods:{
            addProductToCart: function (orderProduct){

                const matchingProductIndex = this.$props.cartProducts.findIndex((item) => {
                    return item.id === orderProduct.id;
                });

                if(matchingProductIndex > -1){
                    this.$props.cartProducts[matchingProductIndex].qty++;
                    let price = this.$props.cartProducts[matchingProductIndex].price * this.$props.cartProducts[matchingProductIndex].qty;
                    this.$props.cartProducts[matchingProductIndex].totalPrice = Number.parseFloat(price).toFixed(2);
                    let saveExisting = this.$props.cartProducts[matchingProductIndex];
                    this.$props.cartProducts.splice(matchingProductIndex, 1);
                    this.$props.cartProducts.splice(matchingProductIndex,0,saveExisting);
                }else{
                    orderProduct.qty = 1 ;
                    let price = orderProduct.price * orderProduct.qty;
                    orderProduct.totalPrice = Number.parseFloat(price).toFixed(2) ;
                    this.$props.cartProducts.push(orderProduct);
                }

                localStorage.cartProducts = JSON.stringify(this.$props.cartProducts) ;
            }
        },

        mounted() {

        }
    }
    //@TODO : VUE template
</script>
