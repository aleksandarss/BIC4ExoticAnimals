<template>
   
   <div class="container">
      <h1 class="title pb-3 fs-1 customHeaderColorSpeciesList text-center"> Search for a specific animal </h1>
      
      <nav class="navbar navbar-expand-lg bg-light mb-3 justify-content-center">
         <div class="d-flex">
            <p class="p-2 flex-fill bd-highlight align-self-center fs-4">Search for animal by name:</p>
            <div class="p-2 flex-fill bd-highlight">
               <form class="d-flex" @submit.prevent="submit">
                  <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search" id="q" v-model="form.q">
                  <button class="btn btn-outline-success" type="submit">Search</button>
               </form>
            </div>
         </div>
      </nav>
      <div class="box custom-box " v-if="hasAnimals">
                    <animals-list :animals="animals"></animals-list>
      </div>
   </div>
</template>

<script>
   import AnimalsList from './AnimalsListComponent';

   let form = new Form({
      'q': ''
   })

   export default {
      name: "AnimalSearchComponent",
      components: {
         TableElement,
         AnimalsList
      },
      data() {
         return {
            animals: [],
            animalsFound: false,
            query: '',
            form: form,
            hasAnimals: false
         }
      },
      methods: {
         submit() {
            this.hasAnimals = false;
            this.form
               .post('/search/animal')
               .then(response => {
                  console.log("RESPONSE: ", response);
                  this.animals = response;
                  this.hasAnimals = true;
               })
               .catch(err => {
                  console.log("SOMETHING WENT WRONG: ", err);
               })
         }
      }
   }
</script>
