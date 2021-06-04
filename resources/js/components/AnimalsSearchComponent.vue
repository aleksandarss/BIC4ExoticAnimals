
<template>
   <div class="container">
      <section class="hero">
            <div class="hero-body">
               <div class="container has-text-centered">
               <div class="hero-body"> 
                  <p class="customFontColor title is-size-1">Search for a animal!</p>
               </div>
               <h2 class="subtitle">Just type in the name of the animal you want to search for.</h2>
               </div>
            </div>
      </section>
      <section class="hero">
         <div class="columns is-multiline">
            <div class="card column is-half is-offset-one-quarter has-background-dark">
               <header class="card-header">
                  <h1 class="card-header-title is-centered">
                     {{ 'Search Animal' }}
                  </h1>
               </header>
               <div class="card-content">
                  <div class="content">
                     <slot>
                        <form class="field" @submit.prevent="submit">
                           <div class="field">
                              <label class="label has-text-white has-text-centered">Name of animal</label>
                           </div>
                           <div class="control field">
                              <input class="input" type="text" placeholder="Text input" id="q" v-model="form.q">
                           </div>
                           <div class="control field">
                              <button class="button is-link is-success" type="submit">Submit</button>
                           </div>
                        </form>
                     </slot>
                  </div>
               </div>
            </div>
         </div>
          <div class="columns is-multiline">
            <div class="column">
               <div class="box custom-box" v-if="hasAnimals">
                              <animals-list :animals="animals"></animals-list>
               </div>
            </div>
         </div>
      </section>
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
