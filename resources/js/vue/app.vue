
<template>
    <div class="app-todolist-container">
        <div class="heading">
            <h2 id="todolist_title">Todo List</h2>
            <add-item-form />
        </div>
        <list-item />
    </div>
</template>

<script>
import AddItemForm from "./add-item-form";
import ListItem from "./list-item";

export default {
    components: {
        ListItem,
        AddItemForm
    }
}
</script>

<style scoped>
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
</style>
