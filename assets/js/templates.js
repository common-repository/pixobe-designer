/**
 *  Save Templates
 */
async function saveTemplateData(event) {
  event.preventDefault();
  event.stopPropagation();
  // console.log
  const designer = document.getElementById("pixobe-designer-template");
  const templateName = document.getElementById("template_name");

  if (designer) {
    const data = await designer.getJson();
    const templateId = designer.dataset.id;
    jQuery.ajax({
      url: pixobeDesignerSettings.ajax_url,
      method: "POST",
      data: {
        action: "pixobe_designer_save_template",
        nonce: pixobeDesignerSettings.nonce,
        id: templateId,
        data: JSON.stringify(data),
        templateName: templateName.value,
      },
      success: (response) => {
        if (response.success) {
          // Assuming the server returns the saved template ID as `response.data.designer_id`
          const savedTemplateId = response.data.id;
          // Redirect to the same page with template_id in query parameter
          const currentUrl = new URL(window.location.href);
          currentUrl.searchParams.set("template_id", savedTemplateId);
          window.location.href = currentUrl.toString();
        } else {
          alert(response.data.msg);
        }
      },
      error: () => {
        alert("An error occurred while processing the request.");
      },
    });
  }
}

async function renderTemplateBuilder(container) {
  const digest = document.getElementById("digest").value;
  const siteId = document.getElementById("site_id").value;
  const expiry = document.getElementById("expiry").value;
  const templateId = document.getElementById("template_id").value;

  const designer = document.createElement("pixobe-designer");
  designer.id = "pixobe-designer-template";
  designer.digest = digest;
  designer.siteId = siteId;
  designer.expiry = expiry;
  designer.dataset.id = templateId;
  designer.classList.add("w-full");

  if (!templateId) {
    container.replaceChildren(designer);
    return;
  }

  jQuery.ajax({
    url: pixobeDesignerSettings.ajax_url,
    method: "GET",
    data: {
      action: "pixobe_designer_get_template",
      nonce: pixobeDesignerSettings.nonce,
      template_id: templateId,
    },
    success: (response) => {
      const data = response.data;
      if (data) {
        const config = data.data;
        designer.template = config;
      }
      container.replaceChildren(designer);
    },
    error: () => {
      alert("An error occurred while processing the request.");
    },
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const templateBuilder = document.getElementById("template-builder");
  if (templateBuilder) {
    renderTemplateBuilder(templateBuilder);
  }
});
