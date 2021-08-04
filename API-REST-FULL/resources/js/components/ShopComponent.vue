<template>

    <div class="container">

        <div class="row">
            <div class="offset-md-3 col-md-6">
             <h2>Add New product</h2>
              <form-component @add="newProduct"></form-component>
         </div>


 </div>
 <br>

 <div class="album py-5 bg-light">
     <div class="container">
         <div class="row">
             <div class="offset-md-3">
                 <h2>Products</h2>
             </div>
         </div>
     </div>

       <div class="row">
            <card-component v-for="(product,index) in products"
            :product="product"
            @delete="deleteProduct(index)"
            :key="product.id">
            </card-component>
       </div>
     </div>
   </div>

</template>


<script>
import CardComponent from './CardComponent'
import FormComponent from './FormComponent'
	export default {
            components: {
                CardComponent,
                FormComponent
            },
            data(){
                return{
                    products: [
                        /*{
                          id: '1',
                          name: 'Sistema Operativo',
                          description: 'Windows 2000 Server',
                          image: 'https://aprender-libre.com/wp-content/uploads/2018/09/windows_2000___remake_wallpaper_by_jcpag2010-dbgqs7j1.jpg',
                          price: '$100.000 pesos'
                    },
                     {
                          id: '2',
                          name: 'Sistema Operativo',
                          description: 'Windows 98 Second Edition',
                          image: 'https://www.profesionalreview.com/wp-content/uploads/2020/10/Windows-98-5.jpg',
                          price: '$50.000 pesos'
                    },*/

                ]
            }
          },
        methods: {
            newProduct(product){
                this.products.push(product)
                //console.log(product, '.l.');
            },
            deleteProduct(index) {
                this.products.splice(index,1);

            }
        },
        mounted(){
            axios.get('/api/products').then((response) => {
                this.products = response.data.products

            });
        }

	}

</script>

<style>

</style>
