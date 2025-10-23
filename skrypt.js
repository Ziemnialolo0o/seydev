
  const video = document.getElementById('bg-video');
  const audio = document.getElementById('tick-sound');

  function startMedia() {
    video.play().catch(e => {
      console.log("Błąd odtwarzania wideo:", e);
    });
    audio.play().catch(e => {
      console.log("Błąd odtwarzania audio:", e);
    });
  }

  window.addEventListener('load', () => {
    startMedia();
  });

  window.addEventListener('click', () => {
    if (audio.paused) {
      startMedia();
    }
  });

  video.addEventListener('ended', () => {
    window.location.href = 'glowna.php';
  });
  window.addEventListener('load', () => {
  const preloader = document.getElementById('preloader');
  const content = document.getElementById('content');

  preloader.style.display = 'none';
  content.style.display = 'block';
});