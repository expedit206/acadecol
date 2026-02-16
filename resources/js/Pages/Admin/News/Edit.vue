<template>
    <AdminLayout title="Modifier une Actualité">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier l'Actualité
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form
                        @submit.prevent="submit"
                        class="p-6 text-gray-900 space-y-6"
                    >
                        <!-- Translatable Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- French -->
                            <div class="space-y-4">
                                <h3
                                    class="font-semibold text-lg text-blue-600 border-b pb-2"
                                >
                                    Français
                                </h3>
                                <div>
                                    <label
                                        for="title_fr"
                                        class="block text-sm font-medium text-gray-700"
                                        >Titre (FR)</label
                                    >
                                    <input
                                        v-model="form.title.fr"
                                        type="text"
                                        id="title_fr"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required
                                    />
                                    <div
                                        v-if="form.errors['title.fr']"
                                        class="text-red-600 text-sm mt-1"
                                    >
                                        {{ form.errors["title.fr"] }}
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="content_fr"
                                        class="block text-sm font-medium text-gray-700"
                                        >Contenu (FR)</label
                                    >
                                    <textarea
                                        v-model="form.content.fr"
                                        id="content_fr"
                                        rows="10"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required
                                    ></textarea>
                                    <div
                                        v-if="form.errors['content.fr']"
                                        class="text-red-600 text-sm mt-1"
                                    >
                                        {{ form.errors["content.fr"] }}
                                    </div>
                                </div>
                            </div>

                            <!-- English -->
                            <div class="space-y-4">
                                <h3
                                    class="font-semibold text-lg text-red-600 border-b pb-2"
                                >
                                    Anglais
                                </h3>
                                <div>
                                    <label
                                        for="title_en"
                                        class="block text-sm font-medium text-gray-700"
                                        >Titre (EN)</label
                                    >
                                    <input
                                        v-model="form.title.en"
                                        type="text"
                                        id="title_en"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    />
                                    <div
                                        v-if="form.errors['title.en']"
                                        class="text-red-600 text-sm mt-1"
                                    >
                                        {{ form.errors["title.en"] }}
                                    </div>
                                </div>

                                <div>
                                    <label
                                        for="content_en"
                                        class="block text-sm font-medium text-gray-700"
                                        >Contenu (EN)</label
                                    >
                                    <textarea
                                        v-model="form.content.en"
                                        id="content_en"
                                        rows="10"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    ></textarea>
                                    <div
                                        v-if="form.errors['content.en']"
                                        class="text-red-600 text-sm mt-1"
                                    >
                                        {{ form.errors["content.en"] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Common Fields -->
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t"
                        >
                            <div>
                                <label
                                    for="slug"
                                    class="block text-sm font-medium text-gray-700"
                                    >Slug (URL)</label
                                >
                                <input
                                    v-model="form.slug"
                                    type="text"
                                    id="slug"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50"
                                    required
                                />
                                <div
                                    v-if="form.errors.slug"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.slug }}
                                </div>
                            </div>

                            <div>
                                <label
                                    for="image"
                                    class="block text-sm font-medium text-gray-700"
                                    >Image de couverture</label
                                >
                                <div
                                    v-if="imagePreview || news.image"
                                    class="mt-2 mb-4"
                                >
                                    <img
                                        :src="imagePreview || '/' + news.image"
                                        alt="Preview"
                                        class="h-40 w-full object-cover rounded-lg border shadow-sm"
                                    />
                                </div>
                                <input
                                    type="file"
                                    id="image"
                                    @change="handleImageUpload"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    accept="image/*"
                                />
                                <div
                                    v-if="form.errors.image"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.image }}
                                </div>
                            </div>

                            <div v-if="!form.is_published">
                                <label
                                    for="published_at"
                                    class="block text-sm font-medium text-gray-700"
                                    >Date de Publication</label
                                >
                                <input
                                    v-model="form.published_at"
                                    type="datetime-local"
                                    id="published_at"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                                <div
                                    v-if="form.errors.published_at"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.published_at }}
                                </div>
                            </div>

                            <div class="flex items-center mt-6">
                                <input
                                    v-model="form.is_published"
                                    id="is_published"
                                    type="checkbox"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                />
                                <label
                                    for="is_published"
                                    class="ml-2 block text-sm text-gray-900"
                                >
                                    Publier immédiatement
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-end pt-6 border-t">
                            <Link
                                :href="route('admin.news.index')"
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300"
                                >Annuler</Link
                            >
                            <button
                                type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 disabled:opacity-50"
                                :disabled="form.processing"
                            >
                                {{
                                    form.processing
                                        ? "Enregistrement..."
                                        : "Mettre à jour"
                                }}
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
import { useForm, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

const props = defineProps({
    news: Object,
});

const imagePreview = ref(null);

const form = useForm({
    _method: "PUT",
    title: { fr: "", en: "" },
    content: { fr: "", en: "" },
    slug: "",
    image: null,
    published_at: "",
    is_published: false,
});

onMounted(() => {
    form.title = props.news.title || { fr: "", en: "" };
    form.content = props.news.content || { fr: "", en: "" };
    form.slug = props.news.slug;
    // Format date for datetime-local input (YYYY-MM-DDTHH:MM)
    if (props.news.published_at) {
        const date = new Date(props.news.published_at);
        // Adjust for timezone offset to show correct local time in input
        const offset = date.getTimezoneOffset() * 60000;
        const localISOTime = new Date(date.getTime() - offset)
            .toISOString()
            .slice(0, 16);
        form.published_at = localISOTime;
    }
    form.is_published = Boolean(props.news.is_published);
});

const handleImageUpload = (e) => {
    const file = e.target.files[0];
    form.image = file;
    if (file) {
        imagePreview.value = URL.createObjectURL(file);
    } else {
        imagePreview.value = null;
    }
};

const submit = () => {
    form.post(route("admin.news.update", props.news.id));
};
</script>
