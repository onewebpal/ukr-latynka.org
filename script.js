function switchTheme() {
    return {
        darkMode: true,
        toggleTheme() {
            this.darkMode = !this.darkMode;
        }
    }
}