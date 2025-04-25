<template>
    <div class="news-container">
      <!-- Header: Tampilan utama dengan latar belakang gradient dan overlay -->
      <header class="news-header">
        <div class="header-overlay">
          <h1 class="header-title2" v-if="content && content.titles">UTS API Anla Harpanda - Soal 2</h1>
          <h1 class="header-title3" v-if="content && content.titles">API kedua : CNBC Indonesia</h1>
        </div>
      </header>
  
      <!-- Konten Utama Berita -->
      <main class="news-main" v-if="content">
        <!-- Berita Utama -->
        <article class="news-article">
          <div class="header-overlay2">
            <h1 class="header-title" v-if="content && content.titles">{{ content.titles.title }}</h1>
            <p class="header-subtitle" v-if="content && content.authors">{{ content.authors.editor_name }}</p>
          </div>
          <img
            class="news-image"
            :src="content.images && content.images[0] ? content.images[0].cover : 'https://via.placeholder.com/1200x600'"
            :alt="content.titles ? content.titles.title : 'Default Title'"
          />
          <div class="news-content">
            <div class="news-meta">
              <span class="news-date" v-if="content.dateset">{{ content.dateset.created }}</span>
              <span class="news-type" v-if="content.dateset">{{ content.dateset.type }}</span>
            </div>
            <p class="news-resume" v-if="content.resume">{{ content.resume }}</p>
            <a :href="content.url" target="_blank" class="news-readmore" v-if="content.url">Baca Selengkapnya</a>
          </div>
        </article>
  
        <!-- Bagian Related Stories -->
        <section class="related-stories" v-if="content.relatedstory && content.relatedstory.length">
          <h2 class="related-title">Berita Terkait</h2>
          <div class="stories-list">
            <div class="story-card" v-for="story in content.relatedstory" :key="story.idberita">
              <img :src="story.image_cover" :alt="story.title" class="story-image" />
              <div class="story-info">
                <h3 class="story-title">{{ story.title }}</h3>
                <span class="story-date">{{ story.date }}</span>
              </div>
            </div>
          </div>
        </section>
      </main>
  
      <!-- Loader bila data belum dimuat -->
      <div v-else class="loader">Memuat data...</div>
  
      <!-- Footer -->
      <footer class="news-footer">
        <p>&copy; 2025 News Portal - Coded by Your Name</p>
        <div class="social-links">
          <a href="https://facebook.com" target="_blank">Facebook</a>
          <a href="https://twitter.com" target="_blank">Twitter</a>
          <a href="https://instagram.com" target="_blank">Instagram</a>
        </div>
      </footer>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'NewsArticle',
    data() {
      return {
        content: null
      };
    },
    mounted() {
      this.fetchContent();
    },
    methods: {
      async fetchContent() {
        try {
          const response = await axios.get("http://127.0.0.1:8000/api/viva/detail");
          // Asumsi struktur data: { content: { ... } }
          if (response.data && response.data.content) {
            this.content = response.data.content;
            console.log("Content fetched:", this.content);
          }
        } catch (error) {
          console.error("Error fetching content:", error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  /* ===================== BASE & RESET ===================== */
  
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body, html {
    width: 100%;
    height: 100%;
  }
  .news-container {
    font-family: 'Arial', sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }
  
  /* ===================== HEADER ===================== */
  .news-header {
    position: relative;
    height: 120px;
    background: linear-gradient(135deg, #ff416c, #ff4b2b);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .header-overlay {
    position: relative;
    z-index: 2;
    text-align: center;
    color: #ffd4d4;
    animation: fadeIn 1.5s ease-out;
  }
  .header-overlay2 {
    position: relative;
    z-index: 2;
    text-align: center;
    color: #8b8080;
    animation: fadeIn 1.5s ease-out;
  }
  .header-title {
    font-size: 2rem;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
  }
  .header-title2 {
    font-size: 3rem;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    font-size: 3rem;
    letter-spacing: 1px;
  }
  .header-title2 {
    font-size: 0,5rem;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    font-size: 3rem;
    letter-spacing: 1px;
  }
  .header-subtitle {
    font-size: 1rem;
    opacity: 0.9;
  }
  
  /* ===================== MAIN CONTENT ===================== */
  .news-main {
    display: flex;
    gap: 2rem;
    padding: 2rem;
    background: #f7f7f7;
  }
  .news-article {
    
    place-items: center;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    animation: slideUp 1s ease-out;
    flex: 2;
  }
  .news-image {
    width: 100%;
    height: auto;
    object-fit: cover;
  }
  .news-content {
    padding: 1.5rem;
  }
  .news-meta {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 1rem;
  }
  .news-resume {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #333;
    margin-bottom: 1.5rem;
  }
  .news-readmore {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    background: linear-gradient(135deg, #12c2e9, #c471ed);
    color: #fff;
    border-radius: 50px;
    text-decoration: none;
    transition: transform 0.3s ease, opacity 0.3s ease;
  }
  .news-readmore:hover {
    transform: scale(1.05);
    opacity: 0.9;
  }
  
  /* ===================== RELATED STORIES ===================== */
  .related-stories {
    flex: 1;
  }
  .related-title {
    font-size: 2rem;
    text-align: center;
    margin-bottom: 1.5rem;
    color: #444;
  }
  .stories-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .story-card {
    background: #fff;
    width: 100%;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.07);
    transition: transform 0.3s ease;
  }
  .story-card:hover {
    transform: scale(1.02);
  }
  .story-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }
  .story-info {
    padding: 1rem;
  }
  .story-title {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    color: #222;
  }
  .story-date {
    font-size: 0.8rem;
    color: #888;
  }
  
  /* ===================== LOADER ===================== */
  .loader {
    padding: 2rem;
    text-align: center;
    font-size: 1.5rem;
    color: #555;
  }
  
  /* ===================== FOOTER ===================== */
  .news-footer {
    background: #222;
    color: #ccc;
    text-align: center;
    padding: 1.5rem;
  }
  .news-footer p {
    margin-bottom: 1rem;
  }
  .social-links a {
    margin: 0 0.5rem;
    color: #ff416c;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  .social-links a:hover {
    color: #ff4b2b;
  }
  
  /* ===================== ANIMASI ===================== */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  @keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }
  
  /* ===================== RESPONSIVE ===================== */
  @media (max-width: 768px) {
    .news-main {
      flex-direction: column; /* Mengubah menjadi satu kolom */
      gap: 1rem;
    }
    .header-title {
      font-size: 2rem;
    }
    .news-article {
      flex-direction: column;
    }
    .stories-list {
      flex-direction: column;
      align-items: stretch;
    }
    .story-card {
      width: 100%;
    }
  }
  </style>
  