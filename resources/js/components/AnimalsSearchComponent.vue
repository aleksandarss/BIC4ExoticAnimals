<template>
   
   <div class="container">
      <h1 class="title pb-3 fs-1 customHeaderColorSpeciesList text-center"> Search for a specific animal </h1>
      
      <nav class="navbar navbar-expand-lg bg-light mb-3 justify-content-center">
         <div class="d-flex">
            <p class="p-2 flex-fill bd-highlight align-self-center fs-4">Search for animal by name:</p>
            <div class="p-2 flex-fill bd-highlight">
               <form class="d-flex">
                  <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
               </form>
            </div>
         </div>
      </nav>
  
      <table class="table is-fullwidth is-hoverable">
         <thead>
            <tr class="title is-6 text-center">
               <table-element element-type="th">Name</table-element>
               <table-element element-type="th">Description</table-element>
               <table-element element-type="th">Animals</table-element>
               <table-element element-type="th">Created</table-element>
               <table-element element-type="th">Modified</table-element>
               <table-element element-type="th"></table-element>
            </tr>
         </thead>
         <tbody>
            <tr class="title is-6 text-center">
               <table-element element-type="td">Hallo</table-element>
               <table-element element-type="td">Batuhan</table-element>
               <table-element element-type="td">das</table-element>
               <table-element element-type="td">ist</table-element>
               <table-element element-type="td">test</table-element>
               <table-element element-type="td">asdasd</table-element>
            </tr>

         </tbody>
      </table>
   </div>
</template>