class PixobeDesignerShortcode extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
  }

  connectedCallback() {
    const designer = document.createElement("pixobe-designer");
    designer.background = this.getAttribute("background");
    designer.expiry = this.getAttribute("expiry");
    designer.site_id = this.getAttribute("site_id");
    designer.digest = this.getAttribute("digest");
    const template = this.getAttribute("template");
    return this.getTemplateData(template)
      .then((templateContent) => {
        if (templateContent) {
          designer.template = templateContent;
        }
      })
      .catch((e) => {
        console.error(e);
      })
      .finally(() => {
        designer.fonts = pixobeDesignerSettings.fonts;
        designer.mediaItems = pixobeDesignerSettings.mediaItems;
        this.shadowRoot.replaceChildren(designer);
      });
  }

  async getTemplateData(template) {
    return new Promise((res, rej) => {
      if (!template) {
        return res(null);
      }

      jQuery.ajax({
        url: pixobeDesignerSettings.ajaxurl,
        method: "GET",
        data: {
          action: "pixobe_designer_shortcode",
          nonce: pixobeDesignerSettings.nonce,
          template: template,
        },
        success: (response) => {
          if (response.status === "success") {
            return res(response.template);
          }
          return res(null);
        },
        error: (e) => {
          console.error(e);
          return rej("Unable to fetch template data");
        },
      });
    });
  }
}
customElements.define("designer-shortcode", PixobeDesignerShortcode);
