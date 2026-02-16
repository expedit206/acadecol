<script setup>
import { ref } from "vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    formations: Array,
});

const mode = ref("register"); // 'register' ou 'login'
const customEducationLevel = ref("");

const form = useForm({
    formation_id: "",
    last_name: "",
    first_name: "",
    email: "",
    phone: "",
    whatsapp: "",
    birth_date: "",
    gender: "M",
    birth_place: "",

    education_level: "",
    last_school: "",
    major_field: "",

    message: "",
});

const loginForm = useForm({
    phone: "",
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        education_level:
            data.education_level === "Autre"
                ? customEducationLevel.value
                : data.education_level,
    })).post(route("pre-registration.store"));
};

const submitLogin = () => {
    loginForm.post(route("pre-registration.check"));
};
</script>

<template>
    <PublicLayout>
        <div
            class="py-12 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen"
        >
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Flash Warning -->
                <div
                    v-if="$page.props.flash?.warning"
                    class="mb-6 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-sm"
                >
                    <p class="font-bold">⚠️ Attention</p>
                    <p>{{ $page.props.flash?.warning }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-2xl rounded-2xl">
                    <!-- TABS -->
                    <div class="px-6 sm:px-10 bg-white py-8">
                        <!-- MODE INSCRIPTION -->
                        <div v-show="mode === 'register'">
                            <div class="mb-8 text-center">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full mb-4"
                                >
                                    <i
                                        class="fas fa-graduation-cap text-white text-2xl"
                                    ></i>
                                </div>
                                <h1
                                    class="text-3xl font-bold text-gray-900 mb-2"
                                >
                                    Formulaire de Pré-inscription
                                </h1>
                                <p
                                    class="text-gray-600 text-sm max-w-2xl mx-auto"
                                >
                                    Remplissez ce formulaire détaillé pour
                                    réserver votre place. Plus votre dossier
                                    sera complet, plus nous pourrons évaluer
                                    rapidement votre candidature. Aucun frais
                                    n'est requis à cette étape.
                                </p>
                            </div>

                            <form @submit.prevent="submit" class="space-y-8">
                                <!-- ========== SECTION 1: FORMATION ========== -->
                                <div
                                    class="bg-blue-50 p-6 rounded-xl border-2 border-blue-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-book"></i>
                                        Formation Souhaitée
                                    </h2>
                                    <div>
                                        <InputLabel
                                            for="formation_id"
                                            value="Sélectionnez votre formation *"
                                        />
                                        <select
                                            id="formation_id"
                                            v-model="form.formation_id"
                                            class="mt-2 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm py-3"
                                            required
                                        >
                                            <option value="">
                                                -- Choisissez une formation --
                                            </option>
                                            <option
                                                v-for="formation in formations"
                                                :key="formation.id"
                                                :value="formation.id"
                                            >
                                                {{ formation.titre.fr }}
                                            </option>
                                        </select>
                                        <InputError
                                            :message="form.errors.formation_id"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>

                                <!-- ========== SECTION 2: IDENTITÉ ========== -->
                                <div
                                    class="bg-gray-50 p-6 rounded-xl border-2 border-gray-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-user"></i>
                                        Informations Personnelles
                                    </h2>

                                    <div class="space-y-4">
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Nom -->
                                            <div>
                                                <InputLabel
                                                    for="last_name"
                                                    value="Nom *"
                                                />
                                                <TextInput
                                                    id="last_name"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.last_name"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.last_name
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Prénom -->
                                            <div>
                                                <InputLabel
                                                    for="first_name"
                                                    value="Prénom *"
                                                />
                                                <TextInput
                                                    id="first_name"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.first_name"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.first_name
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-3 gap-4"
                                        >
                                            <!-- Date de naissance -->
                                            <div>
                                                <InputLabel
                                                    for="birth_date"
                                                    value="Date de naissance *"
                                                />
                                                <TextInput
                                                    id="birth_date"
                                                    type="date"
                                                    class="mt-1 block w-full"
                                                    v-model="form.birth_date"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.birth_date
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Lieu de naissance -->
                                            <div>
                                                <InputLabel
                                                    for="birth_place"
                                                    value="Lieu de naissance *"
                                                />
                                                <TextInput
                                                    id="birth_place"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.birth_place"
                                                    placeholder="Ex: Yaoundé"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.birth_place
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Sexe -->
                                            <div>
                                                <InputLabel
                                                    for="gender"
                                                    value="Sexe *"
                                                />
                                                <select
                                                    id="gender"
                                                    v-model="form.gender"
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="M">
                                                        Masculin
                                                    </option>
                                                    <option value="F">
                                                        Féminin
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors.gender
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Email -->
                                            <div>
                                                <InputLabel
                                                    for="email"
                                                    value="Email *"
                                                />
                                                <TextInput
                                                    id="email"
                                                    type="email"
                                                    class="mt-1 block w-full"
                                                    v-model="form.email"
                                                    placeholder="exemple@email.com"
                                                    required
                                                />
                                                <InputError
                                                    :message="form.errors.email"
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Téléphone -->
                                            <div>
                                                <InputLabel
                                                    for="phone"
                                                    value="Téléphone *"
                                                />
                                                <TextInput
                                                    id="phone"
                                                    type="tel"
                                                    class="mt-1 block w-full"
                                                    v-model="form.phone"
                                                    placeholder="Ex: 699123456"
                                                    required
                                                />
                                                <InputError
                                                    :message="form.errors.phone"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <!-- WhatsApp -->
                                        <div>
                                            <InputLabel
                                                for="whatsapp"
                                                value="Numéro WhatsApp (si différent) "
                                            />
                                            <TextInput
                                                id="whatsapp"
                                                type="tel"
                                                class="mt-1 block w-full"
                                                v-model="form.whatsapp"
                                                placeholder="Ex: 699123456"
                                            />
                                            <InputError
                                                :message="form.errors.whatsapp"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 3: PARCOURS ACADÉMIQUE ========== -->
                                <div
                                    class="bg-green-50 p-6 rounded-xl border-2 border-green-200 mb-8"
                                >
                                    <h2
                                        class="text-xl font-bold text-green-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-graduation-cap"></i>
                                        Niveau d'Étude
                                    </h2>

                                    <div class="space-y-4">
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Niveau d'étude -->
                                            <div>
                                                <InputLabel
                                                    for="education_level"
                                                    value="Dernier Diplôme Obtenu *"
                                                />
                                                <select
                                                    id="education_level"
                                                    v-model="
                                                        form.education_level
                                                    "
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="">
                                                        -- Sélectionnez --
                                                    </option>
                                                    <option value="CEP">
                                                        CEP / FSLC
                                                    </option>
                                                    <option value="BEPC">
                                                        BEPC / GCE O Level
                                                    </option>
                                                    <option value="Probatoire">
                                                        Probatoire
                                                    </option>
                                                    <option
                                                        value="Baccalauréat"
                                                    >
                                                        Baccalauréat / GCE A
                                                        Level
                                                    </option>
                                                    <option value="BTS/DUT">
                                                        BTS / DUT / HND
                                                    </option>
                                                    <option value="Licence">
                                                        Licence / Bachelor
                                                    </option>
                                                    <option value="Master">
                                                        Master / Master's Degree
                                                    </option>
                                                    <option value="Doctorat">
                                                        Doctorat / PhD
                                                    </option>
                                                    <option value="Autre">
                                                        Autre (Préciser)
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors
                                                            .education_level
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <div
                                                v-if="
                                                    form.education_level ===
                                                    'Autre'
                                                "
                                            >
                                                <InputLabel
                                                    for="custom_education_level"
                                                    value="Précisez votre niveau *"
                                                />
                                                <TextInput
                                                    id="custom_education_level"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="
                                                        customEducationLevel
                                                    "
                                                    placeholder="Ex: Diplôme d'ingénieur"
                                                    required
                                                />
                                            </div>

                                            <!-- Filière -->
                                            <div>
                                                <InputLabel
                                                    for="major_field"
                                                    value="Série / Filière (Optionnel)"
                                                />
                                                <TextInput
                                                    id="major_field"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.major_field"
                                                    placeholder="Ex: Scientifique, Littéraire, Gestion..."
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.major_field
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <!-- Établissement -->
                                        <div>
                                            <InputLabel
                                                for="last_school"
                                                value="Dernier Établissement Fréquenté (Optionnel)"
                                            />
                                            <TextInput
                                                id="last_school"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.last_school"
                                                placeholder="Ex: Lycée de ..., Université de ..."
                                            />
                                            <InputError
                                                :message="
                                                    form.errors.last_school
                                                "
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <PrimaryButton
                                    class="w-full bg-blue-600 text-white hover:bg-blue-700 justify-center py-4 text-lg font-bold shadow-lg hover:shadow-xl transition transform hover:scale-105"
                                    :class="{
                                        'opacity-50 cursor-not-allowed':
                                            form.processing,
                                    }"
                                    :disabled="form.processing"
                                >
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    {{
                                        form.processing
                                            ? "Envoi en cours..."
                                            : "Envoyer ma candidature"
                                    }}
                                </PrimaryButton>

                                <div class="mb-4 mt-2 text-center">
                                    <button
                                        type="button"
                                        @click="mode = 'login'"
                                        class="text-blue-600 font-bold hover:underline"
                                    >
                                        Déjà pré-inscrit ? Connectez-vous ici
                                    </button>
                                </div>
                                <!-- </div> -->
                            </form>
                        </div>

                        <!-- MODE CONNEXION -->
                        <div v-show="mode === 'login'" class="py-8">
                            <div class="text-center mb-8">
                                <i
                                    class="fas fa-folder-open text-6xl text-blue-600 mb-4"
                                ></i>
                                <h2 class="text-3xl font-bold text-gray-900">
                                    Consulter mon dossier
                                </h2>
                                <p class="text-gray-500 mt-2">
                                    Saisissez le numéro de téléphone utilisé
                                    lors de votre inscription.
                                </p>
                            </div>

                            <form
                                @submit.prevent="submitLogin"
                                class="max-w-md mx-auto space-y-6"
                            >
                                <div>
                                    <InputLabel
                                        for="login_phone"
                                        value="Téléphone (WhatsApp)"
                                    />
                                    <TextInput
                                        id="login_phone"
                                        v-model="loginForm.phone"
                                        type="tel"
                                        class="mt-1 block w-full text-lg p-3"
                                        placeholder="Ex: 699999999"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="loginForm.errors.phone"
                                    />
                                </div>

                                <div class="flex flex-col gap-4">
                                    <PrimaryButton
                                        :class="{
                                            'opacity-25': loginForm.processing,
                                        }"
                                        :disabled="loginForm.processing"
                                        class="w-full text-center justify-center py-4 text-lg bg-blue-600 hover:bg-blue-700"
                                    >
                                        <i class="fas fa-search mr-2"></i> Voir
                                        ma fiche
                                    </PrimaryButton>

                                    <button
                                        type="button"
                                        @click="mode = 'register'"
                                        class="text-blue-600 font-bold hover:underline text-center"
                                    >
                                        Pas encore pré-inscrit ? Créer une
                                        demande
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
