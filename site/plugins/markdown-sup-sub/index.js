(function () {
  window.markdownEditorButtons = window.markdownEditorButtons || [];
  window.markdownEditorButtons.push({
    get button() {
      return {
        icon: "superscript",
        label: "Exposant",
        command: this.command,
      };
    },

    get command() {
      return () => {
        this.editor.insert("<sup>texte</sup>");
      };
    },

    get name() {
      return "sup";
    },

    get isDisabled() {
      return () => false;
    },
  });
})();

(function () {
  window.markdownEditorButtons = window.markdownEditorButtons || [];
  window.markdownEditorButtons.push({
    get button() {
      return {
        icon: "subscript",
        label: "Indice",
        command: this.command,
      };
    },

    get command() {
      return () => {
        this.editor.insert("<sub>texte</sub>");
      };
    },

    get name() {
      return "sub";
    },

    get isDisabled() {
      return () => false;
    },
  });
})();


(function () {
  window.markdownEditorButtons = window.markdownEditorButtons || [];
  window.markdownEditorButtons.push({
    get button() {
      return {
        icon: "guillemets-double",
        label: "Entourer de «\u202Fguillemets francais\u202F»",
        command: this.command,
      };
    },

    get command() {
      return () => {
        // Obtenons d'abord la sélection actuelle, si l'API le permet
        let selection = "";
        
        try {
          // Essayons différentes méthodes pour obtenir la sélection
          if (this.editor.getSelection) {
            selection = this.editor.getSelection();
          } else if (this.editor.codemirror && this.editor.codemirror.getSelection) {
            selection = this.editor.codemirror.getSelection();
          }
        } catch (e) {
          // En cas d'erreur, nous utiliserons un texte par défaut
          selection = "";
        }
        
        // Si nous avons une sélection, insérons les guillemets autour
        if (selection && selection.length > 0) {
          // Supprimons d'abord la sélection
          try {
            this.editor.deleteSelection();
          } catch (e) {
            // Si cette méthode n'existe pas, nous devrons insérer le texte complet
          }
          
          // Insérons le texte avec les guillemets
          this.editor.insert("«\u202F" + selection + "\u202F»");
        } else {
          // Sinon, insérons simplement un placeholder
          this.editor.insert("«\u202Ftexte\u202F»");
        }
      };
    },

    get name() {
      return "guillemetsFrancais";
    },

    get isDisabled() {
      return () => false;
    },
  });
})();

(function () {
  window.markdownEditorButtons = window.markdownEditorButtons || [];
  window.markdownEditorButtons.push({
    get button() {
      return {
        icon: "guillemets-simple", 
        label: "Entourer de “guillemets de second niveau”",
        command: this.command,
      };
    },

    get command() {
      return () => {
        // Obtenons d'abord la sélection actuelle, si l'API le permet
        let selection = "";
        
        try {
          // Essayons différentes méthodes pour obtenir la sélection
          if (this.editor.getSelection) {
            selection = this.editor.getSelection();
          } else if (this.editor.codemirror && this.editor.codemirror.getSelection) {
            selection = this.editor.codemirror.getSelection();
          }
        } catch (e) {
          // En cas d'erreur, nous utiliserons un texte par défaut
          selection = "";
        }
        
        // Si nous avons une sélection, insérons les guillemets autour
        if (selection && selection.length > 0) {
          // Supprimons d'abord la sélection
          try {
            this.editor.deleteSelection();
          } catch (e) {
            // Si cette méthode n'existe pas, nous devrons insérer le texte complet
          }
          
          // Insérons le texte avec les guillemets
          this.editor.insert("“\u202F" + selection + "\u202F”");
        } else {
          // Sinon, insérons simplement un placeholder
          this.editor.insert("“\u202Ftexte\u202F”");
        }
      };
    },

    get name() {
      return "guillemetsSecondniveau";
    },

    get isDisabled() {
      return () => false;
    },
  });
})();



