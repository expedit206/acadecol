<template>
    <AdminLayout title="Créer une Catégorie">
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex items-center gap-4">
                    <Link
                        :href="route('admin.categories.index')"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        <i class="fas fa-arrow-left text-xl"></i>
                    </Link>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Créer une Catégorie
                    </h1>
                </div>

                <!-- Form -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6 space-y-6">
                        <!-- Nom FR -->
                        <div>
                            <label
                                for="nom_fr"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Nom (Français)
                                <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="nom_fr"
                                v-model="form.nom.fr"
                                type="text"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            />
                            <p
                                v-if="form.errors['nom.fr']"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors["nom.fr"] }}
                            </p>
                        </div>

                        <!-- Nom EN -->
                        <div>
                            <label
                                for="nom_en"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Nom (Anglais)
                                <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="nom_en"
                                v-model="form.nom.en"
                                type="text"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            />
                            <p
                                v-if="form.errors['nom.en']"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors["nom.en"] }}
                            </p>
                        </div>

                        <!-- Slug -->
                        <div>
                            <label
                                for="slug"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Slug <span class="text-red-500">*</span>
                            </label>
                            <input
                                id="slug"
                                v-model="form.slug"
                                type="text"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            />
                            <p class="mt-1 text-sm text-gray-500">
                                URL-friendly identifier (ex: langues,
                                paramedical)
                            </p>
                            <p
                                v-if="form.errors.slug"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.slug }}
                            </p>
                        </div>

                        <!-- Description FR -->
                        <div>
                            <label
                                for="description_fr"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Description (Français)
                            </label>
                            <textarea
                                id="description_fr"
                                v-model="form.description.fr"
                                rows="3"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            ></textarea>
                            <p
                                v-if="form.errors['description.fr']"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors["description.fr"] }}
                            </p>
                        </div>

                        <!-- Description EN -->
                        <div>
                            <label
                                for="description_en"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Description (Anglais)
                            </label>
                            <textarea
                                id="description_en"
                                v-model="form.description.en"
                                rows="3"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            ></textarea>
                            <p
                                v-if="form.errors['description.en']"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors["description.en"] }}
                            </p>
                        </div>

                        <!-- Icon Class -->
                        <div>
                            <label
                                for="icon_class"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Classe d'icône
                            </label>
                            <input
                                id="icon_class"
                                v-model="form.icon_class"
                                type="text"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="fas fa-language"
                            />
                            <p class="mt-1 text-sm text-gray-500">
                                FontAwesome class (ex: fas fa-language, fas
                                fa-heartbeat)
                            </p>
                            <p
                                v-if="form.errors.icon_class"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.icon_class }}
                            </p>
                        </div>

                        <!-- Ordre d'affichage -->
                        <div>
                            <label
                                for="ordre_affichage"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Ordre d'affichage
                            </label>
                            <input
                                id="ordre_affichage"
                                v-model.number="form.ordre_affichage"
                                type="number"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                min="0"
                            />
                            <p class="mt-1 text-sm text-gray-500">
                                Ordre d'affichage sur le site (plus petit =
                                affiché en premier)
                            </p>
                            <p
                                v-if="form.errors.ordre_affichage"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.ordre_affichage }}
                            </p>
                        </div>

                        <!-- Buttons -->
                        <div
                            class="flex items-center justify-end gap-4 pt-6 border-t"
                        >
                            <Link
                                :href="route('admin.categories.index')"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                            >
                                Annuler
                            </Link>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span v-if="form.processing">
                                    <i class="fas fa-spinner fa-spin mr-2"></i>
                                    Création...
                                </span>
                                <span v-else>
                                    <i class="fas fa-save mr-2"></i>
                                    Créer la catégorie
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    nom: {
        fr: "",
        en: "",
    },
    slug: "",
    description: {
        fr: "",
        en: "",
    },
    icon_class: "",
    ordre_affichage: 0,
});

const submit = () => {
    form.post(route("admin.categories.store"));
};
</script>
