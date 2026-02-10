<template>
    <AdminLayout title="Modifier la Formation">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-6 flex items-center gap-4">
                    <Link
                        :href="route('admin.formations.index')"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        <i class="fas fa-arrow-left text-xl"></i>
                    </Link>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Modifier la Formation
                    </h1>
                </div>

                <!-- Form -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6 space-y-6">
                        <!-- Catégorie -->
                        <div>
                            <label
                                for="category_id"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Catégorie <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="category_id"
                                v-model="form.category_id"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required
                            >
                                <option value="">
                                    Sélectionnez une catégorie
                                </option>
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.nom.fr }}
                                </option>
                            </select>
                            <p
                                v-if="form.errors.category_id"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.category_id }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Titre FR -->
                            <div>
                                <label
                                    for="titre_fr"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Titre (Français)
                                    <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="titre_fr"
                                    v-model="form.titre.fr"
                                    type="text"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                />
                                <p
                                    v-if="form.errors['titre.fr']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["titre.fr"] }}
                                </p>
                            </div>

                            <!-- Titre EN -->
                            <div>
                                <label
                                    for="titre_en"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Titre (Anglais)
                                    <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="titre_en"
                                    v-model="form.titre.en"
                                    type="text"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                />
                                <p
                                    v-if="form.errors['titre.en']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["titre.en"] }}
                                </p>
                            </div>
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
                                URL-friendly identifier
                            </p>
                            <p
                                v-if="form.errors.slug"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.slug }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Description courte FR -->
                            <div>
                                <label
                                    for="description_courte_fr"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Description courte (FR)
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="description_courte_fr"
                                    v-model="form.description_courte.fr"
                                    rows="3"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                ></textarea>
                                <p
                                    v-if="form.errors['description_courte.fr']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["description_courte.fr"] }}
                                </p>
                            </div>

                            <!-- Description courte EN -->
                            <div>
                                <label
                                    for="description_courte_en"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Description courte (EN)
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="description_courte_en"
                                    v-model="form.description_courte.en"
                                    rows="3"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                ></textarea>
                                <p
                                    v-if="form.errors['description_courte.en']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["description_courte.en"] }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Description complète FR -->
                            <div>
                                <label
                                    for="description_complete_fr"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Description complète (FR)
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="description_complete_fr"
                                    v-model="form.description_complete.fr"
                                    rows="5"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                ></textarea>
                                <p
                                    v-if="
                                        form.errors['description_complete.fr']
                                    "
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["description_complete.fr"] }}
                                </p>
                            </div>

                            <!-- Description complète EN -->
                            <div>
                                <label
                                    for="description_complete_en"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Description complète (EN)
                                    <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="description_complete_en"
                                    v-model="form.description_complete.en"
                                    rows="5"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    required
                                ></textarea>
                                <p
                                    v-if="
                                        form.errors['description_complete.en']
                                    "
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["description_complete.en"] }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Débouchés FR -->
                            <div>
                                <label
                                    for="debouches_fr"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Débouchés (FR)
                                </label>
                                <textarea
                                    id="debouches_fr"
                                    v-model="form.debouches.fr"
                                    rows="3"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                ></textarea>
                                <p
                                    v-if="form.errors['debouches.fr']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["debouches.fr"] }}
                                </p>
                            </div>

                            <!-- Débouchés EN -->
                            <div>
                                <label
                                    for="debouches_en"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Débouchés (EN)
                                </label>
                                <textarea
                                    id="debouches_en"
                                    v-model="form.debouches.en"
                                    rows="3"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                ></textarea>
                                <p
                                    v-if="form.errors['debouches.en']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["debouches.en"] }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Prérequis FR -->
                            <div>
                                <label
                                    for="prerequis_fr"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Prérequis (FR)
                                </label>
                                <textarea
                                    id="prerequis_fr"
                                    v-model="form.prerequis.fr"
                                    rows="3"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                ></textarea>
                                <p
                                    v-if="form.errors['prerequis.fr']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["prerequis.fr"] }}
                                </p>
                            </div>

                            <!-- Prérequis EN -->
                            <div>
                                <label
                                    for="prerequis_en"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Prérequis (EN)
                                </label>
                                <textarea
                                    id="prerequis_en"
                                    v-model="form.prerequis.en"
                                    rows="3"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                ></textarea>
                                <p
                                    v-if="form.errors['prerequis.en']"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors["prerequis.en"] }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Prix -->
                            <div>
                                <label
                                    for="prix"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Prix (XAF)
                                </label>
                                <input
                                    id="prix"
                                    v-model.number="form.prix"
                                    type="number"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    min="0"
                                />
                                <p
                                    v-if="form.errors.prix"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors.prix }}
                                </p>
                            </div>

                            <!-- Durée -->
                            <div>
                                <label
                                    for="duree"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Durée
                                </label>
                                <input
                                    id="duree"
                                    v-model="form.duree"
                                    type="text"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="3 mois"
                                />
                                <p
                                    v-if="form.errors.duree"
                                    class="mt-1 text-sm text-red-600"
                                >
                                    {{ form.errors.duree }}
                                </p>
                            </div>

                            <!-- Mise en avant -->
                            <div>
                                <label
                                    for="is_featured"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Mise en avant
                                </label>
                                <div class="flex items-center h-[42px]">
                                    <input
                                        id="is_featured"
                                        v-model="form.is_featured"
                                        type="checkbox"
                                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    />
                                    <label
                                        for="is_featured"
                                        class="ml-2 text-sm text-gray-600"
                                    >
                                        Afficher sur la page d'accueil
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div
                            class="flex items-center justify-end gap-4 pt-6 border-t"
                        >
                            <Link
                                :href="route('admin.formations.index')"
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
                                    Mise à jour...
                                </span>
                                <span v-else>
                                    <i class="fas fa-save mr-2"></i>
                                    Mettre à jour
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

const props = defineProps({
    formation: Object,
    categories: Array,
});

const form = useForm({
    category_id: props.formation.category_id,
    titre: props.formation.titre,
    slug: props.formation.slug,
    description_courte: props.formation.description_courte,
    description_complete: props.formation.description_complete,
    debouches: props.formation.debouches || { fr: "", en: "" },
    prerequis: props.formation.prerequis || { fr: "", en: "" },
    prix: props.formation.prix,
    duree: props.formation.duree || "",
    is_featured: props.formation.is_featured || false,
});

const submit = () => {
    form.put(route("admin.formations.update", props.formation.id));
};
</script>
