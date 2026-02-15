<template>
    <footer class="bg-gray-900 text-gray-100 mt-8">
        <!-- Main Footer -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <span class="text-2xl">📚</span>
                        AcadEcol
                    </h3>
                    <p class="text-gray-400 text-sm">
                        Plateforme leader en formations profesionnelles et
                        certifications en ligne.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold mb-4">Liens Rapides</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <Link
                                href="/"
                                class="text-gray-400 hover:text-white transition"
                                >Accueil</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/formations"
                                class="text-gray-400 hover:text-white transition"
                                >Formations</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/actualites"
                                class="text-gray-400 hover:text-white transition"
                                >Actualités</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/a-propos"
                                class="text-gray-400 hover:text-white transition"
                                >À Propos</Link
                            >
                        </li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-bold mb-4">Catégories</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a
                                href="/formations?cat=informatique"
                                class="text-gray-400 hover:text-white transition"
                                >Informatique</a
                            >
                        </li>
                        <li>
                            <a
                                href="/formations?cat=sante"
                                class="text-gray-400 hover:text-white transition"
                                >Santé</a
                            >
                        </li>
                        <li>
                            <a
                                href="/formations?cat=commerce"
                                class="text-gray-400 hover:text-white transition"
                                >Commerce</a
                            >
                        </li>
                        <li>
                            <a
                                href="/formations?cat=langues"
                                class="text-gray-400 hover:text-white transition"
                                >Langues</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold mb-4">Nous Contacter</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-center gap-2">
                            <span>📍</span>
                            <span
                                >Bafoussam, en face de l'ancienne gare routière
                                général voyage</span
                            >
                        </li>
                        <li class="flex items-center gap-2">
                            <span>📧</span>
                            <a
                                href="mailto:info@acadecol.cm"
                                class="hover:text-white transition"
                                >info@acadecol.cm</a
                            >
                        </li>
                        <li class="flex items-center gap-2">
                            <span>📱</span>
                            <a
                                href="tel:+237691056965"
                                class="hover:text-white transition"
                                >+237 691 05 69 65</a
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-700 pt-8">
                <!-- Social Links -->
                <div class="flex justify-center gap-6 mb-6">
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition text-2xl"
                        ><i class="fab fa-facebook"></i
                    ></a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition text-2xl"
                        ><i class="fab fa-twitter"></i
                    ></a>
                    <a
                        href="#"
                        class="text-gray-400 hover:text-white transition text-2xl"
                        ><i class="fab fa-instagram"></i
                    ></a>
                </div>

                <!-- Copyright -->
                <div class="text-center text-gray-500 text-sm">
                    <p>&copy; 2026 AcadEcol. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
