// bytewebster.com
// bytewebster.com
// bytewebster.com
function showSweetAlert() {
  Swal.fire({
    title: "Bạn có chắc không?",
    text: "Bạn sẽ không thể hoàn tác hành động này!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý, xóa!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Deleted!", "Record has been successfully deleted.", "success");
    }
  });
}
