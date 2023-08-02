<script>
import axios from 'axios';
import {onMounted, ref} from 'vue';

export default {
    setup() {
        // reactive state
        let users = ref([]);
        // mounted
        onMounted(() => {
            // get api from laravel backend
            axios
                .get('/products')
                .then((res) => {
                    // assign state users with response data
                    users.value = res.data.data;
                })
                .catch((error) => {
                    console.log(error.res.data);
                });
        });

        return {
            users
        };
    },
};
</script>

<template>
    <VRow>
        <!-- basic -->
        <VCol cols="12">
            <VCard title="Users">
                <VTable>
                    <thead>
                    <tr>
                        <th className="text-uppercase">
                            Id
                        </th>
                        <th className="text-center text-uppercase">
                            name
                        </th>
                        <th className="text-center text-uppercase">
                            price
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="user in users">
                        <td>{{ user.id }}</td>
                        <td className="text-center">{{ user.name }}</td>
                        <td className="text-center">
                            {{ user.price }}
                        </td>
                    </tr>
                    </tbody>
                </VTable>

            </VCard>
        </VCol>
    </VRow>
</template>
