
<template>
    <div class="todolist-item">
        <input
            type="checkbox"
            class="cursor-pointer"
        />
        <span :class="[ item.completed ? 'completed' : '', 'item-title' ]">{{item.title}}</span>
    </div>
</template>

<script>
export default {
    props: ['item'],
};
</script>

<style scoped>
.todolist-item {
    display: flex;
    justify-content: center;
    align-items: center;
}
.completed {
    text-decoration: line-through;
    color: #999999;
}
.item-title {
    width: 100%;
    margin-left: 20px;
}
</style>
