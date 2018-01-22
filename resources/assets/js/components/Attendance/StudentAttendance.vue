<template>
	<div class="row">
		<div class="col-md-3">
	        <div class="panel panel-default">
	            <div class="panel-body">
	                <table class="table table-striped table-hover">
	                    <thead>
	                        <tr>
	                            <th>
	                            	Classes
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
	    			<h5>Choose a date in which this register was or is being taken. (Default is today if not chosen)</h5>
	    			<input type="date" class="form-control" v-model="date">
	    		</div>
	    	</div>
	        <div class="panel panel-default">
	            <div class="panel-body">
	                <table class="table table-striped table-hover">
	                    <thead>
	                        <tr>
	                            <th width="90%">{{ chosenStream }} {{ attendees }}</th>
	                            <th>P</th>
	                            <th>A</th>
	                        </tr>
	                    </thead>
	                    <tbody>
                            <tr v-for="student in students">
                                <td width="90%">
                                    <a :href="'/students/'+student.id">
                                        {{ student.first_name }} {{ student.middle_name }} {{ student.last_name }}
                                    </a>
                                </td>
                                <td>
                                    <input @click="syncAttendance(student, 1)" type="checkbox" name="is_present">
                                </td>
                                <td>
                                    <input @click="syncAttendance(student, 0)" type="checkbox" name="is_present">
                                </td>
                            </tr>
	                    </tbody>
	                </table>
	                <div class="alert alert-info">
                    	<p>There are currently no {{ attendees }}</p>
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
				date: null
			}
		},
		methods: {
			loadStudents(stream) {
				this.chosenStream = stream.name
				this.students = stream.students
			},
			syncAttendance (student, is_present) {
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
		}
	}
</script>
<style scoped>
	.stream-name {
		cursor: pointer;
	}
</style>