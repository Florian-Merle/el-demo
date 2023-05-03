import {EditorView, basicSetup} from "codemirror";

import { LanguageSupport } from '@codemirror/language';
import { ELLanguage } from "codemirror-lang-el";

import {completeFromList} from "@codemirror/autocomplete"

export function customLanguage(completionList) {
  const elCompletion = ELLanguage.data.of({
      autocomplete: completeFromList(completionList),
    });

  return new LanguageSupport(ELLanguage, [elCompletion]);
}

const editors = document.querySelectorAll('[data-editor-configuration]');
editors.forEach(editor => {
    const { formSelector, editorSourceSelector, completionList } = JSON.parse(editor.dataset.editorConfiguration);

    const editorSource = document.querySelector(editorSourceSelector);
    editorSource.setAttribute("hidden", "true");

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
