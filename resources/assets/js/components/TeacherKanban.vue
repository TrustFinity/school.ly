<template>
    <div id="board">
        <div class="row">
            <!--<div class="col-md-12">-->
                <!--<div class = "checkbox">-->
                    <!--<label><input type = "checkbox" v-model="editable">Enable drag and drop</label>-->
                <!--</div>-->
                <!--&lt;!&ndash;<button type="button" class="btn btn-default" @click="orderList">Sort by original order</button>&ndash;&gt;-->
                <!--<hr class="row">-->
            <!--</div>-->
            <div  class="col-md-3">
                <h4 class="heading">Planning</h4>
                <div class="col">
                    <draggable class="list-group" element="ul" v-model="planning_list"
                               :options="dragOptions"
                               :move="onMove"
                               @start="isDragging=true"
                               @end="isDragging=false">
                        <transition-group type="transition" :name="'flip-list'">
                            <li class="list-group-item" v-for="(card, index) in planning_list" :key="index">
                                <!--<i :class="card.fixed? 'glyphicon glyphicon-lock' : 'glyphicon glyphicon-lock'"-->
                                <!--@click=" card.fixed=! card.fixed" aria-hidden="true"></i>-->
                                <h4>{{card.title}}</h4>
                                <p class="small">{{ card.description }}</p>
                                <span class="classroom">{{ card.classgroup ? card.classgroup.name : 'No class' }}</span>
                            </li>
                        </transition-group>
                    </draggable>
                    <p v-if="!isCreating" class="text-primary add-new" @click="addNew">Add new plan</p>
                    <textarea name="lesson" id="lesson"
                              class="form-control"
                              v-model="newDataTitle"
                              v-if="isCreating"></textarea>
                    <button class="btn btn-success btn-xs" @click="saveNew" v-if="isCreating">Save</button>
                    <span class="text-danger pull-right add-new" @click="cancelNew" v-if="isCreating">Cancel</span>
                </div>
            </div>

            <div  class="col-md-3">
                <h4 class="heading">In Class</h4>
                <div class="col">
                    <draggable card="span"
                               v-model="inclass_list"
                               :options="dragOptions"
                               :move="onMove">
                        <transition-group name="no" class="list-group" tag="ul">
                            <li class="list-group-item" v-for="(card, index) in inclass_list" :key="index">
                                <!--<i :class="card.fixed? 'glyphicon glyphicon-lock' : 'glyphicon glyphicon-lock'"-->
                                <!--@click=" card.fixed=! card.fixed" aria-hidden="true"></i>-->
                                <h4>{{card.title}}</h4>
                                <p class="small">{{ card.description }}</p>
                                <span class="classroom">{{ card.classgroup ? card.classgroup.name : 'No class' }}</span>
                            </li>
                        </transition-group>
                    </draggable>
                </div>
            </div>

            <div  class="list-group col-md-3">
                <h4 class="heading">Testing</h4>
                <div class="col">
                    <!--<pre>{{listString}}</pre>-->
                    <draggable card="span"
                               v-model="testing_list"
                               :options="dragOptions"
                               :move="onMove">
                        <transition-group name="no" class="list-group" tag="ul">
                            <li class="list-group-item" v-for="(card, index) in testing_list" :key="index">
                                <!--<i :class="card.fixed? 'glyphicon glyphicon-lock' : 'glyphicon glyphicon-lock'"-->
                                <!--@click=" card.fixed=! card.fixed" aria-hidden="true"></i>-->
                                <h4>{{card.title}}</h4>
                                <p class="small">{{ card.description }}</p>
                                <span class="classroom">{{ card.classgroup ? card.classgroup.name : 'No class' }}</span>
                            </li>
                        </transition-group>
                    </draggable>
                </div>
            </div>
            <div  class="list-group col-md-3">
                <h4 class="heading">Completed</h4>
                <div class="col">
                    <!--<pre>{{list2String}}</pre>-->
                    <draggable card="span"
                               v-model="completed_list"
                               :options="dragOptions"
                               :move="onMove">
                        <transition-group name="no" class="list-group" tag="ul">
                            <li class="list-group-item" v-for="(card, index) in completed_list" :key="index">
                                <!--<i :class="card.fixed? 'glyphicon glyphicon-lock' : 'glyphicon glyphicon-lock'"-->
                                <!--@click=" card.fixed=! card.fixed" aria-hidden="true"></i>-->
                                <h4>{{card.title}}</h4>
                                <p class="small">{{ card.description }}</p>
                                <span class="classroom">{{ card.classgroup ? card.classgroup.name : 'No class' }}</span>
                            </li>
                        </transition-group>
                    </draggable>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        name: 'TeacherKanban',
        props: {
            teacher: {
                type: Object,
                required: true,
            },
        },
        components: {
            draggable,
        },
        data () {
            return {
                planning_list: [],
                inclass_list:[],
                testing_list:[],
                completed_list:[],
                editable:true,
                isDragging: false,
                delayedDragging:false,
                isCreating: false,
                newDataTitle: '',
            }
        },
        methods:{
            orderList () {
                this.planning_list = this.planning_list.sort((one,two) =>{return one.order-two.order; })
            },
            onMove ({relatedContext, draggedContext}) {
                // finc a way of updating the statuses of the
                // elements asynchronously
                console.log(relatedContext)
            },
            addNew () {
                if (this.isCreating){
                    this.isCreating = false
                }
                this.isCreating = true
            },
            saveNew () {
                if (this.isCreating){
                    this.isCreating = false
                }
                if (this.newDataTitle.length === 0){
                    console.log("Enter something inside the text area")
                    return
                }
                this.planning_list.push({title:this.newDataTitle, description:''})
            },
            cancelNew () {
                if (this.isCreating){
                    this.isCreating = false
                }
            },
            presentData(data) {
                console.log(data)
            },
        },
        computed: {
            dragOptions () {
                return  {
                    animation: 0,
                    group: 'description',
                    disabled: !this.editable,
                    ghostClass: 'ghost'
                };
            },
        },
        watch: {
            isDragging (newValue) {
                if (newValue){
                    this.delayedDragging= true
                    return
                }
                this.$nextTick( () =>{
                    this.delayedDragging =false
                })
            }
        },
        created() {
            axios.get('/api/teachers-kanban/'+this.teacher.id)
                .then((response) => {
                    if (response.data.length === 0) {
                        // show default create kanban cards
                        return
                    }
                    for (let i=0; i<response.data.length; i++) {
                        var card = response.data[i]
                        if (card.status === 'Planning'){
                            this.planning_list.push(card)
                        }else if (card.status === 'In Class'){
                            this.inclass_list.push(card)
                        }else if (card.status === 'Testing'){
                            this.testing_list.push(card)
                        }else if (card.status === 'Completed'){
                            this.completed_list.push(card)
                        }
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
</script>

<style scoped>
    #board {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
    }
     .flip-list-move {
         transition: transform 0.5s;
     }

    .no-move {
        transition: transform 0s;
    }

    .ghost {
        opacity: .5;
        background: #C8EBFB;
    }

    .list-group {
        min-height: 20px;
    }

    h4 {
        cursor: move;
    }

    .list-group-item i{
        cursor: pointer;
    }
    .heading {
        background: rgba(0,0,0, .1);
        padding: 5px;
        margin-bottom: 0px;
    }

    .col {
        background: rgba(0,0,0, .1);
        padding: 5px;
        box-shadow: 0px 8px 15px 0px #cccccc;
    }
    .add-new{
        cursor: pointer;
        text-decoration: underline;
        padding: 3px;
        margin-bottom: 0px;
    }
    .classroom {
        margin-bottom: 5px;
        background: rgba(10,85,28,0.86);
        color: #ffffff;
        padding: 5px;
        border-radius: 100%;
        box-shadow: 0px 8px 15px 0px #cccccc;
    }
    .classroom:hover {
        cursor: pointer;
        box-shadow: 0px 0px 0px 0px #cccccc;
    }
</style>
