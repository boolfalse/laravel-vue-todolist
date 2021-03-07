
<template>
    <div class="app-todolist-container">
        <div class="heading">
            <h2 id="todolist_title">Todo List</h2>
            <add-item-form
                v-on:reloadList="getList()"
            />
        </div>
        <todo-list
            :items="items"
            v-on:reloadList="getList()"
        />
    </div>
</template>

<script>
import AddItemForm from "./add-item-form";
import TodoList from "./todo-list";

export default {
    components: {
        TodoList,
        AddItemForm
    },
    data: () => {
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get('/api/items')
                .then((res) => {
                    if (res.data.success) {
                        this.items = res.data.data
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    },
    created() { // runs when this current component created
        this.getList();
    }
}
</script>

<style>
.app-todolist-container {
    width: 350px;
    margin: auto;
}
.heading {
    background: #e6e6e6;
    padding: 10px;
}
#todolist_title {
    text-align: center;
}
.cursor-pointer {
    cursor: pointer;
}
</style>
