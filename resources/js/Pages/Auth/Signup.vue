<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const errors = ref({});

const submit = () => {
    form.post('/signup', {
        onError: (error) => {
            errors.value = error;
        }
    })
}

</script>

<template>
    <div class="mx-auto h-screen w-screen flex justify-center items-center">
        <Card class="w-full max-w-sm">
            <CardHeader>
                <CardTitle class="text-2xl">
                    Signup
                </CardTitle>
                <CardDescription>
                    Enter your email below to login to your account.
                </CardDescription>
            </CardHeader>
            <form @submit.prevent="submit">
                <CardContent class="grid gap-4 ">
                    <!-- Name -->
                    <div class="grid gap-2">
                        <Label for="name">
                            Name
                        </Label>
                        <Input
                            id="name"
                            type="text"
                            placeholder="Fulano de Tal"
                            required
                            autocomplete="false"
                            autofocus
                            v-model="form.name"
                            :class="{'is-valid': errors.name}"
                        />
                        <span v-if="errors.name">
                            {{ errors.name }}
                        </span>
                    </div>

                    <!-- Email -->
                    <div class="grid gap-2">
                        <Label for="email">
                            Email
                        </Label>
                        <Input
                            id="email"
                            type="email"
                            placeholder="m@example.com"
                            required
                            v-model="form.email"
                            :class="{'is-valid': errors.email}"
                        />
                        <span v-if="errors.email">
                            {{ errors.email }}
                        </span>
                    </div>

                    <!-- Password -->
                    <div class="grid gap-2">
                        <Label for="password">
                            Password
                        </Label>
                        <Input
                            id="password"
                            type="password"
                            required
                            v-model="form.password"
                            :class="{'is-valid': errors.password}"
                        />
                        <span v-if="errors.password">
                            {{ errors.password }}
                        </span>
                    </div>

                    <!-- Password Confirm -->
                    <div class="grid gap-2">
                        <Label for="password">
                            Password Confirm
                        </Label>
                        <Input
                            id="password_confirmation"
                            type="password"
                            required
                            v-model="form.password_confirmation"
                            :class="{'is-valid': errors.password_confirmation}"
                        />
                        <span v-if="errors.password_confirmation">
                            {{ errors.password_confirmation }}
                        </span>
                    </div>
                </CardContent>
                <CardFooter>
                    <Button type="submit" class="w-full">
                        Sign in
                    </Button>
                </CardFooter>
            </form>

        </Card>
    </div>
</template>
