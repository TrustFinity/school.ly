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
	    					Pick the date this register was taken. 
	    					<span class="text-primary">choose older dates for old entries.</span>
	    					<span class="small text-danger">(Required)</span>
	    				</label>
	    				<input type="date" class="form-control" v-model="date">
	    			</div>
	    			<br>
	    			<div class="alert alert-danger" v-show="dateIsNotChosen">
						Please choose a date for this attendance record first
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
	    			</div>
	    		</div>
	    	</div>
	        <div class="panel panel-default" v-show="chosenStream">
	            <div class="panel-body">

	            	<div class="alert alert-danger" v-show="fieldsNotPopulated">
						Make sure class/stream is chosen first and all fields are filled in properly.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
	    			</div>

	    			<div class="alert alert-info" v-show="info">
						{{ info }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
	    			</div>

	            	<div class="form-group">
	            		<h3>{{ chosenStream.name }}</h3>
	            	</div>
	            	<hr>
	            	<div class="form-group">
	            		<label for="boys">
	            			Number of Boys present
	            			<span class="text-danger small"> (Required)</span>
	            		</label>
	            		<p class="small">Please note that this cannot be updated incase of a mistake.</p>
	            		<input type="number" class="form-control" v-model="boys" required>
	            	</div>
	            	<div class="form-group">
	            		<label for="girls">
	            			Number of Girls present
	            			<span class="text-danger small"> (Required)</span>
	            		</label>
	            		<p class="small">Please note that this cannot be updated incase of a mistake.</p>
	            		<input type="number" class="form-control" v-model="girls" required>
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
				chosenStream: '',
				date: null,
				boys: '',
				girls: '',
				dateIsNotChosen: false,
				fieldsNotPopulated: false,
				info: ''
			}
		},
		methods: {
			loadStudents(stream) {
				this.chosenStream = stream
			},
			saveAttendance () {
				this.info = ''
				this.dateIsNotChosen = false
				if (!this.date) {
					this.dateIsNotChosen = true
					return
				}

				this.fieldsNotPopulated = false

				if (!this.chosenStream  || !this.boys || !this.girls) {
					this.fieldsNotPopulated = true
					return
				}
				axios.get('/api/v1/attendances/save', {
				    params: {
				      	boys: this.boys,
				      	girls: this.girls,
				      	date: this.date,
				      	stream_id: this.chosenStream.id,
				      	school_id: this.chosenStream.school_id
				  	}
				})
				.then((response) => {
					this.info = response.data
			    })
			  	.catch((error) => {
			  		this.info = error
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