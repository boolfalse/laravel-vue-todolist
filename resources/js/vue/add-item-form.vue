
<template>
    <div class="add-item">
        <input type="text" v-model="item.title">
        <font-awesome-icon
            icon="plus-square"
            @click="createItem()"
            :class="[ item.title ? 'active' : 'inactive', 'plus', 'cursor-pointer' ]"
        />
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            item: {
                title: "" // Test todolist item
            }
        }
    },
    methods: {
        createItem() {
            let title = this.item.title;
            if (title) {
                axios.post('/api/items', {
                    title: title
                })
                    .then((res) => {
                        if (res.data.success) {
                            this.item.title = '';
                            this.$emit('reloadList');
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        }
    }
};
</script>

<style>
.add-item {
    display: flex;
    justify-content: center;
    align-items: center;
}
input {
    background: #f7f7f7;
    border: 0;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.plus {
    font-size: 20px;
}
.active {
    color: #00ce25
}
.inactive {
    color: #999999;
}
</style>
