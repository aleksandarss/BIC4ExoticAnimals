
<template>
   <div class="container">
      <!-- Head -->
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
                        <div class="field">
                           <label class="label has-text-white has-text-centered">Name of animal</label>
                           <div class="control">
                              <input class="input" type="text" placeholder="Text input">
                           </div>
                        </div>
                        <div class="field">
                           <label class="label has-text-white has-text-centered">Select species</label>
                           <div class="control">
                              <div class="select">
                                 <select>
                                    <option>Select dropdown</option>
                                    <option>With options</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="control">
                           <button class="button is-link is-success">Submit</button>
                        </div>
                     </slot>
                  </div>
               </div>
            </div>
         </div>
         <div class="columns is-multiline">
            <div class="column">
                <div class="box custom-box">
                    <div class="table-container is-fullwidth">
                        <table class="table table is-striped is-fullwidth is-hoverable has-text-centered">
                            <thead>
                                <tr class="title is-5">
                                    <table-element element-type="th">Name</table-element>
                                    <table-element element-type="th">Description</table-element>
                                    <table-element element-type="th">Species</table-element>
                                    <table-element element-type="th">Created</table-element>
                                    <table-element element-type="th">Modified</table-element>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="animal in animals" :key="animal.id">
                                    <table-element element-type="td">{{animal.name}}</table-element>
                                    <table-element element-type="td">{{animal.description}}</table-element>
                                    <table-element element-type="td">{{animal.species.name}}</table-element>
                                    <table-element element-type="td">{{animal.created_at}}</table-element>
                                    <table-element element-type="td">{{animal.updated_at}}</table-element>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
      </section>      
   </div>
</template>

<script>
    export default {
        props: ['title'],
        mounted() {
            console.log('I am using the correct component.')
        }
    }
</script>