document.addEventListener("DOMContentLoaded", () => {
  const galleryContainer = document.getElementById("pixobe-designer-gallery");

  if (!galleryContainer) return;

  const deleteBtns = galleryContainer.querySelectorAll("#deleteBtn");

  if (!deleteBtns.length) return;

  deleteBtns.forEach((btn) => {
    btn.addEventListener("click", (event) => {
      if (!event.target.classList.contains("delete-image")) return;

      const button = event.target;
      const id = button.getAttribute("data-index");

      if (!confirm("Are you sure you want to delete this image?")) return;

      jQuery.ajax({
        url: pixobeGalleryData.ajax_url,
        method: "POST",
        data: {
          action: "pixobe_delete_image",
          nonce: pixobeGalleryData.nonce,
          id: id,
        },
        success: (response) => {
          if (response.success) {
            button.parentElement.remove();
          } else {
            alert("Error: " + response.data);
          }
        },
        error: () => {
          alert("An error occurred while processing the request.");
        },
      });
    });
  });
});
