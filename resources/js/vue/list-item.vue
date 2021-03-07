
<template>
    <div class="todolist-item">
        <input
            type="checkbox"
            @change="changeItem()"
            v-model="item.completed"
            class="cursor-pointer"
        />
        <span :class="[ item.completed ? 'completed' : '', 'item-title' ]">{{item.title}}</span>
        <button @click="deleteItem()" class="delete-item cursor-pointer">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default() {
                return {}
            }
        }
    },
    methods: {
        changeItem() {
            axios.put('/api/items/' + this.item.id, {
                completed: this.item.completed
            })
                .then((res) => {
                    if (res.data.success) {
                        this.$emit('itemChanged');
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        deleteItem() {
            axios.delete('/api/items/' + this.item.id)
                .then((res) => {
                    if (res.data.success) {
                        this.$emit('itemChanged');
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    }
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
.delete-item {
    background: #e6e6e6;
    border: none;
    color: #ff0000;
    outline: none;
}
</style>
