<template>
<form v-on:submit.prevent="newProduct()">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" v-model="product.name" placeholder="su nombre">
                </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" v-model="product.price" placeholder="su precio">
                </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image">
                </div>
                <div class="form-group">
                  <label for="description">Example textarea</label>
                  <textarea class="form-control" id="description" rows="3" v-model="product.description"></textarea>
                </div>
                <br>
                <div>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>

</template>
<script>
let defaultProduct = {
    name: '',
    price: '',
    description: '',
    image: ''
}
export default{
    data(){
        return {
            product: Object.assign({}, defaultProduct)
        }
    },
    methods: {
        newProduct() {
            axios.post('/api/products', this.product).then((response) => {
                //this.products = response.data.product
                //console.log(response)
                this.$emit('add', /*this.product*/ response.data.product);
            });
            //this.$emit('add', this.product);
            this.product = Object.assign({}, defaultProduct)
            //alert(this.product.name, ':D');
        }
    }
}
</script>
