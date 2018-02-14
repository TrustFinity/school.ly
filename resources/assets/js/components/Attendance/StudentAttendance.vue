<template>
	<div class="row">
		<div class="col-md-3">
	        <div class="panel panel-default">
	            <div class="panel-body">
	                <table class="table table-striped table-hover">
	                    <thead>
	                        <tr>
	                            <th>
	                            	Classes/Streams
	                            </th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<tr v-for="stream in streams">
	                    		<td class="text-primary stream-name" 
	                    			v-on:click="loadStudents(stream)">{{ stream.name }}</td>
	                    	</tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	    <div class="col-md-9">
	    	<div class="panel panel-default">
	    		<div class="panel-body">
	    			<h3>Choose a class/stream from the left to get started.</h3>
	    			<div class="form-group">
	    				<label>
	    					Picck the date this register was taken. 
	    					<span class="text-primary">choose older dates for old entries.</span>
	    					<span class="small text-danger">(Required)</span>
	    				</label>
	    				<input type="date" class="form-control" v-model="date">
	    			</div>
	    			<br>
	    			<div class="alert alert-danger" v-show="dateIsNotChosen">
						Please choose a date for this attendance record first
	    			</div>
	    		</div>
	    	</div>
	        <div class="panel panel-default" v-show="chosenStream">
	            <div class="panel-body">
	            	<div class="form-group">
	            		<h3>{{ chosenStream }}</h3>
	            	</div>
	            	<hr>
	            	<div class="form-group">
	            		<label for="boys">
	            			Number of Boys present
	            			<span class="text-danger small"> (Required)</span>
	            		</label>
	            		<p class="small">Please note that this cannot be updated incase of a mistake.</p>
	            		<input type="number" class="form-control" v-model="boys">
	            	</div>
	            	<div class="form-group">
	            		<label for="girls">
	            			Number of Girls present
	            			<span class="text-danger small"> (Required)</span>
	            		</label>
	            		<p class="small">Please note that this cannot be updated incase of a mistake.</p>
	            		<input type="number" class="form-control" v-model="girls">
	            	</div>
	            	<div class="form-group">
	            		<button class="btn btn-success"
	            			@click="saveAttendance">
	            			Save attendance
	            		</button>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</template>
<script>
	export default {
		name: 'StudentAttendance',
		props: {
			attendees: {
				type: String
			},
			streams: {
				type: Array,
				required: true
			}
		},
		data() {
			return {
				students: [],
				chosenStream: '',
				date: null,
				boys: '',
				girls: '',
				dateIsNotChosen: false,
			}
		},
		methods: {
			loadStudents(stream) {
				this.chosenStream = stream.name
				this.students = stream.students
			},
			saveAttendance () {
				if (!this.date) {
					this.dateIsNotChosen = true
					return
				}
				axios.get('/api/v1/attendances/save/'+student.id, {
				    params: {
				      	is_present: is_present,
				      	date: this.date
				  	}
				})
				.then((response) => {
			    	console.log(response.data)
			    })
			  	.catch((error) => {
			    	console.log(error)
			  	})
			}
		},
	}
</script>
<style scoped>
	.stream-name {
		cursor: pointer;
	}
</style>