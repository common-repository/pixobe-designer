/**
 *
 * @param {*} event
 */
function onFileUpload(event) {
  const file = event.target.files[0];
  if (file) {
    const mediaForm = document.getElementById("media-form");
    mediaForm.submit();
  }
}

async function deleteMedia(event) {
  event.preventDefault();
  const id = event.currentTarget.dataset.media;
  jQuery.ajax({
    url: pixobeDesignerSettings.ajax_url,
    method: "GET",
    data: {
      action: "pixobe_designer_delete_media",
      nonce: pixobeDesignerSettings.nonce,
      id: +id,
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
