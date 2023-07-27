import './bootstrap';
import '../css/app.css';

import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ApiProvider } from '@reduxjs/toolkit/dist/query/react';
import { apiSlice } from './Pages/features/api/apiSlice';
import { ApolloClient, InMemoryCache, ApolloProvider } from '@apollo/client';

const client = new ApolloClient({
    uri: 'http://localhost/',
    cache: new InMemoryCache(),
})

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <ApolloProvider client={client}>
                <ApiProvider api={apiSlice}>
                    <App {...props} />
                </ApiProvider>
            </ApolloProvider>
        );
    },
    progress: {
        color: '#4B5563',
    },
});
