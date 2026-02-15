import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

export function useLocale() {
    const page = usePage();
    const locale = computed(() => {
        return page.props.locale || "fr";
    });

    /**
     * Translate a database field (JSON object with 'fr' and 'en' keys)
     * @param {Object|String} field - The field to translate
     * @returns {String} - The translated string
     */
    const trans = (field) => {
        if (!field) return "";
        if (typeof field === "string") return field;
        return field[locale.value] || field["fr"] || "";
    };

    /**
     * Translate a static key (simple dictionary lookup)
     * For a full solution, use vue-i18n or laravel-vue-i18n
     * This is a simple helper for now to avoid new dependencies
     */
    const translateLabel = (labels) => {
        return labels[locale.value] || labels["fr"] || "";
    };

    return {
        locale,
        trans,
        translateLabel,
    };
}
