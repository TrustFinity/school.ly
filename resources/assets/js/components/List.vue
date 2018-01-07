<template>
    <div class="row">
        <div class="col-md-12">
            <div class = "checkbox">
                <label><input type = "checkbox" v-model="editable">Enable drag and drop</label>
            </div>
            <!--<button type="button" class="btn btn-default" @click="orderList">Sort by original order</button>-->
            <hr class="row">
        </div>
        <div  class="col-md-3">
            <h4 class="heading">Planning</h4>
            <div class="col">
                <draggable class="list-group" element="ul" v-model="list"
                           :options="dragOptions"
                           :move="onMove"
                           @start="isDragging=true"
                           @end="isDragging=false">
                    <transition-group type="transition" :name="'flip-list'">
                        <li class="list-group-item" v-for="element in list" :key="element.order">
                            <!--<i :class="element.fixed? 'glyphicon glyphicon-lock' : 'glyphicon glyphicon-lock'"-->
                               <!--@click=" element.fixed=! element.fixed" aria-hidden="true"></i>-->
                            <h4>{{element.name}}</h4>
                            <p class="small">A very short wrapping description here...</p>
                            <i class="badge">S {{element.order}}</i>
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
                <draggable element="span"
                           v-model="list2"
                           :options="dragOptions"
                           :move="onMove">
                    <transition-group name="no" class="list-group" tag="ul">
                        <li class="list-group-item" v-for="element in list2" :key="element.order">
                            <!--<i :class="element.fixed? 'fa fa-anchor' : 'glyphicon glyphicon-lock'"-->
                               <!--@click=" element.fixed=! element.fixed"-->
                               <!--aria-hidden="true"></i>-->
                                <h4>{{element.name}}</h4>
                                <p class="small">A very short wrapping description here...</p>
                                <i class="badge">S {{element.order}}</i>
                        </li>
                    </transition-group>
                </draggable>
            </div>
        </div>

        <div  class="list-group col-md-3">
            <h4 class="heading">Testing</h4>
            <div class="col">
                <!--<pre>{{listString}}</pre>-->
                <draggable element="span"
                           v-model="list3"
                           :options="dragOptions"
                           :move="onMove">
                    <transition-group name="no" class="list-group" tag="ul">
                        <li class="list-group-item" v-for="element in list3" :key="element.order">
                            <!--<i :class="element.fixed? 'fa fa-anchor' : 'glyphicon glyphicon-lock'"-->
                            <!--@click=" element.fixed=! element.fixed"-->
                            <!--aria-hidden="true"></i>-->
                            <h4>{{element.name}}</h4>
                            <p class="small">A very short wrapping description here...</p>
                            <i class="badge">S {{element.order}}</i>
                        </li>
                    </transition-group>
                </draggable>
            </div>
        </div>
        <div  class="list-group col-md-3">
            <h4 class="heading">Completed</h4>
            <div class="col">
                <!--<pre>{{list2String}}</pre>-->
                <draggable element="span"
                           v-model="list4"
                           :options="dragOptions"
                           :move="onMove">
                    <transition-group name="no" class="list-group" tag="ul">
                        <li class="list-group-item" v-for="element in list4" :key="element.order">
                            <!--<i :class="element.fixed? 'fa fa-anchor' : 'glyphicon glyphicon-lock'"-->
                            <!--@click=" element.fixed=! element.fixed"-->
                            <!--aria-hidden="true"></i>-->
                            <h4>{{element.name}}</h4>
                            <p class="small">A very short wrapping description here...</p>
                            <i class="badge">S {{element.order}}</i>
                        </li>
                    </transition-group>
                </draggable>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    const message = ['The repiratory system', 'Lymphatic system', 'Neural network' , 'Human Anatomy']

    export default {
        name: 'list',
        components: {
            draggable,
        },
        data () {
            return {
                list: message.map( (name,index) => {return {name, order: index+1, description:'', fixed: false}; }),
                list2:['Reproductive Health', 'Biological Classification', 'Zoology']
                    .map( (name,index) => {return {name, order: index+1, description:'', fixed: false}; }),
                list3:[],
                list4:['Public Health'].map( (name,index) => {return {name, order: index+1, description:'', fixed: false}; }),
                editable:true,
                isDragging: false,
                delayedDragging:false,
                isCreating: false,
                newDataTitle: '',
            }
        },
        methods:{
            orderList () {
                this.list = this.list.sort((one,two) =>{return one.order-two.order; })
            },
            onMove ({relatedContext, draggedContext}) {
                const relatedElement = relatedContext.element;
                const draggedElement = draggedContext.element;
                return (!relatedElement || !relatedElement.fixed) && !draggedElement.fixed
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
                this.list.push({name:this.newDataTitle, order:9, description:'', fixed:false})
            },
            cancelNew () {
                if (this.isCreating){
                    this.isCreating = false
                }
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
        }
    }
</script>

<style scoped>
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

    .list-group-item {
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
</style>
