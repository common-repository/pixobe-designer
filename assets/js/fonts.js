async function deleteFont(event) {
  event.preventDefault();
  const fontId = event.currentTarget.dataset.font;
  jQuery.ajax({
    url: pixobeDesignerSettings.ajax_url,
    method: "GET",
    data: {
      action: "pixobe_designer_delete_font",
      nonce: pixobeDesignerSettings.nonce,
      id: +fontId,
    },
    success: (response) => {
      if (response.success) {
        // Assuming the server returns the saved template ID as `response.data.designer_id`
        const currentUrl = new URL(window.location.href);
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
