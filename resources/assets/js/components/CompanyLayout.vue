<template>
  <div class="container">
    <div class="row row--topmargin-11">
      <div class="col-md-12">
        <input type="text" class="form-control input-lg" v-model="searchTerm" id="search" name="search" placeholder="Search">
      </div>
    </div>
    <div class="row" v-if="!companies.list.length || searching">
      <div class="col-md-12">
        <h2 class="text-center">Finding companies...</h2>
      </div>
    </div>
    <div class="row row--topmargin-22">
        <company-box v-for="company in companies.list" 
          :title="company.title"
          :url="company.url"
          :body="company.body"
          :location="company.location"
          :email="company.email"
          :telephone="company.telephone"
          :facebook="company.facebook"
          :twitter="company.twitter"
          :instagram="company.instagram"
          :category="company.category" 
          :subcategory="company.subcategory" 
          :key="company.id"></company-box>
    </div>
  </div>
</template>

<script>

    export default {
      data () {
        return {
          companies: {
            list: []
          },
          searchTerm: '',
          searching: false
        }
      },

      watch: {
        searchTerm (term) {
            this.searching = true
            _.debounce(this.getResults(term), 500)
            
          }
      },

      methods: {
        getResults (term) {
          $.get(`/company/search/${term}`)
            .then(data => {
              this.$set(this.companies, 'list', data)
              this.searching = false
            })
        }
      },

      mounted () {
        this.getResults('')
      }
    }
</script>
