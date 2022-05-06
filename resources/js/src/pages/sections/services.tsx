import { Box, Flex, Heading, HStack } from "@chakra-ui/react";
import React from "react";
import { ServiceCard } from "../../components/serviceCard";
import { RiComputerLine } from "react-icons/ri";

export const Services = () => {
    return (
        <Box w="full" py="50px" px="200px" alignItems="center">
            <Flex justifyContent="space-between" alignItems="center" pb="40px" pl="80px">
                <Heading color="brand:200" fontSize={32} letterSpacing="3px">Vagas disponíveis nas seguintes áreas:</Heading>
            </Flex>
            <HStack w="full" spacing="60px">
                <ServiceCard icon={RiComputerLine} heading="Technologies" description="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"
                />
                <ServiceCard icon={RiComputerLine} heading="Technologies" description="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"
                />
            </HStack>
        </Box>
    );
};