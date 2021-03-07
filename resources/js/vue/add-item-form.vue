
<template>
    <div class="add-item">
        <input type="text" v-model="item.title">
        <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[ item.title ? 'active' : 'inactive', 'plus', 'cursor-pointer' ]"
        />
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
                item: {
                    title: "Test todolist item"
                }
            }
        },
        methods: {
            addItem() {
                if (this.item) {
                    let title = this.item.title;

                    axios.post('/api/items', {
                        title: title
                    }).then((res) => {
                        if (res.success) {
                            this.item.title = '';
                        }
                    }).catch((err) => {
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
.active {
    color: #999999;
}
.cursor-pointer {
    cursor: pointer;
}
</style>
