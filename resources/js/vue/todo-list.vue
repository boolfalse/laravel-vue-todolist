
<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <list-item
                :item="item"
                class="todolist-item"
                v-on:itemChanged="reloadList"
            />
        </div>
    </div>
</template>

<script>
import ListItem from './list-item';

export default {
    props: {
        items: {
            type: Array,
            default() {
                return []
            }
        }
    },
    methods: {
        reloadList() {
            this.$emit('reloadList');
        }
    },
    components: {
        ListItem
    }
};
</script>

<style scoped>
.todolist-item {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
