function hcPomodoroCalcHesapla() {
    const targetHours = parseFloat(document.getElementById('hc-pom-total').value) || 0;
    const targetMins = targetHours * 60;

    // 25 dk çalışma
    const sessions = Math.ceil(targetMins / 25);
    const totalWork = sessions * 25;
    const totalBreak = (sessions - 1) * 5;
    const grandTotal = totalWork + totalBreak;

    document.getElementById('hc-res-pom-count').innerText = sessions + ' Oturum';
    document.getElementById('hc-res-pom-work').innerText = totalWork + ' dk';
    document.getElementById('hc-res-pom-break').innerText = totalBreak + ' dk';
    document.getElementById('hc-res-pom-total-time').innerText = Math.floor(grandTotal / 60) + " s " + (grandTotal % 60) + " dk";
    
    document.getElementById('hc-pomodoro-calc-result').classList.add('visible');
}
