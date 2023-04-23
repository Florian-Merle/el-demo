import {EditorView, basicSetup} from "codemirror";

import { LanguageSupport } from '@codemirror/language';
import { ELLanguage } from "codemirror-lang-el";

import {completeFromList} from "@codemirror/autocomplete"

export function customLanguage(completionList) {
  const elCompletion = ELLanguage.data.of(completionList);

  return new LanguageSupport(ELLanguage, [elCompletion]);
}

const editors = document.querySelectorAll('[data-editor-configuration]');
editors.forEach(editor => {
    const { formSelector, editorSourceSelector } = JSON.parse(editor.dataset.editorConfiguration);

    const editorSource = document.querySelector(editorSourceSelector);
    editorSource.setAttribute("hidden", "true");

    const completionList = {
      autocomplete: completeFromList([
        {label: "est_eligible_pour_la_bourse", type: "function", detail: "eleve, annee"},
        {label: "a_eu_une_bourse_en", type: "function", detail: "eleve, annee"},
        {label: "est_accepte_loin", type: "function", detail: "eleve"},
        {label: "est_inscript_a_parcoursup", type: "function", detail: "eleve"},
        {label: "eleve", type: "variable"},
      ]),
    };

    let view = new EditorView({
      doc: editorSource.value,
      extensions: [
        basicSetup,
        customLanguage(completionList),
      ],
      parent: editor,
    });

    const syncEditor = (e) => {
      editorSource.value = view.state.sliceDoc();
    };

    const form = document.querySelector(formSelector);
    form.addEventListener('submit', syncEditor);
});
