function modal() {
    return {
        open: false,
        openModal() {
            bodyScrollLock.disableBodyScroll(this.$refs['myModal']);
            this.open = true
        },
        closeModal() {
            bodyScrollLock.enableBodyScroll(this.$refs['myModal']);
            this.open = false
        }
    }
}
