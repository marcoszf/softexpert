<script>
import axios from 'axios';
import {onMounted, ref} from 'vue';

export default {
    setup() {
        // reactive state
        let products = ref([]);
        // mounted
        onMounted(() => {
            // get api from laravel backend
            axios
                .get('/products')
                .then((res) => {
                    // assign state products with response data
                    products.value = res.data.data;
                })
                .catch((error) => {
                    console.log(error.res.data);
                });
        });

        return {
            products
        };
    },
};
</script>

<template>
    <VRow>
        <!-- basic -->
        <VCol cols="12">
            <VCard title="Products">
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
                        v-for="product in products">
                        <td>{{ product.id }}</td>
                        <td className="text-center">{{ product.name }}</td>
                        <td className="text-center">
                            {{ product.price }}
                        </td>
                    </tr>
                    </tbody>
                </VTable>

            </VCard>
        </VCol>
    </VRow>
</template>
