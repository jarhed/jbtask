<template>
    <div class="col-md-4">
	    <div class="thumbnail">
	      <img v-bind:src="getMapReference(location)" alt="Map view">
	      <div class="caption">
	        <h3><a v-bind:href="url" target="_blank">{{ title }}</a></h3>
	        <p style="overflow-x: hidden; overflow-y: scroll; height: 100px;">{{ body }}</p>
	        <p class="text-center">
	        	<a v-bind:href="facebook" target="_blank" v-if="facebook"><span class="glyphicon glyphicon-facebook" aria-hidden="true"></span></a> 
	        	<a v-bind:href="twitter" class="btn btn-default" role="button" target="_blank" v-if="twitter">Twitter</a> 
	        	<a v-bind:href="instagram" class="btn btn-default" target="_blank" role="button" v-if="instagram">Instagram</a></p>
	      </div>
	    </div>
    </div>
</template>

<script>
    export default {
    		props: ['title','category','url', 'facebook', 'instagram', 'twitter', 'body', 'location'],
        mounted() {
        },
        methods: {
        	getMapReference: (address) => {
        		let encodedAddress = encodeURIComponent(address)
        		return 'https://maps.googleapis.com/maps/api/staticmap?center=' + encodedAddress +'&zoom=15&size=600x300&markers=color:blue%7Clabel:S%7C'+encodeURIComponent(address)+'&maptype=roadmap&key=AIzaSyBHX9TbX1zj1ArWQ_qGLXIFxZUlyH65u4E'
        	}
        }
    }
</script>
