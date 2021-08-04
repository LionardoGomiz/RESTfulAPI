<template>
 <div class="col-md-4">
           <div class="card mb-4 shadow-sm">
             <!--<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
             <img class="card-img-top" :src="product.image" alt="">

             <div class="card-body">
                 <h1>{{product.name}}</h1>
               <p class="card-text">{{product.description}}</p>
               <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                   <!--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>-->
                   <button type="button" v-on:click="deleteProduct" class="btn btn-sm btn-outline-secondary">Delete</button>
                 </div>
                 <small class="text-muted">{{product.price}}</small>
               </div>
             </div>
           </div>
         </div>


</template>
<script>
export default{
    props:{
        product: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            /*product:{
                id: '1',
                name: 'Sistema Operativo',
                description: 'Windows 2000 Server',
                image: 'https://aprender-libre.com/wp-content/uploads/2018/09/windows_2000___remake_wallpaper_by_jcpag2010-dbgqs7j1.jpg',
                price: '$100.000 pesos'
            },*/
               methods: {
                newProduct() {
                    //console.log(this.product.name, 'hp');
                }
            }
        }
    },
       methods: {
                deleteProduct() {
                     axios.delete('/api/products/' + this.product.id).then(() => {
                          this.$emit('delete');
                     });
                }
            }
        }
</script>
