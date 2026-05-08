function hcSaatDilimiHesapla() {
    const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
    const offset = new Date().getTimezoneOffset();
    const absOffset = Math.abs(offset);
    const h = Math.floor(absOffset / 60);
    const m = absOffset % 60;
    const sign = offset <= 0 ? "+" : "-";
    const offsetStr = `UTC ${sign}${h < 10 ? '0' + h : h}:${m < 10 ? '0' + m : m}`;

    document.getElementById('hc-sd-zone').innerText = tz;
    document.getElementById('hc-sd-offset').innerText = offsetStr;
    document.getElementById('hc-sd-time').innerText = "Yerel Saat: " + new Date().toLocaleTimeString('tr-TR');
    document.getElementById('hc-sd-result').classList.add('visible');
}
