import { extendTheme, ChakraProvider } from '@chakra-ui/react';
import React from "react";
import { Header } from "./components/header";
import { Footer } from "./components/footer";
import { Landing } from "./pages/landing/landing";

const colors = {
    brand: {
        100: '#0ABAB5',
        200: '#0077B6',
        300: '#2a69ac',
    },
}

const theme = extendTheme({
    colors,
    font: {
        heading: "Montserrat",
        body: "Montserrat"
    },
})

export const App = () => (
    <ChakraProvider theme={theme}>
        <Header />
        <Landing />
        <Footer />
    </ChakraProvider>
)